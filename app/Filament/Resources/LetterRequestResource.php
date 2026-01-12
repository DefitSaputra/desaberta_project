<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterRequestResource\Pages;
use App\Models\LetterRequest;
use App\Models\LetterType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\Get;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Grid;
use Filament\Tables\Columns\TextColumn;
use PhpOffice\PhpWord\TemplateProcessor;
use Illuminate\Support\Facades\Storage;
use Filament\Notifications\Notification;
use Carbon\Carbon;

class LetterRequestResource extends Resource
{
    protected static ?string $model = LetterRequest::class;

    protected static ?string $navigationIcon = 'heroicon-o-document-text';
    
    // --- LABEL MENU (Bahasa Indonesia) ---
    protected static ?string $modelLabel = 'Permohonan';
    protected static ?string $pluralModelLabel = 'Daftar Permohonan';
    protected static ?string $navigationLabel = 'Permohonan Masuk';
    protected static ?string $navigationGroup = 'Layanan Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- BAGIAN 1: PEMILIHAN SURAT & STATUS ---
                Section::make('Langkah 1: Pilih Jenis Layanan')
                    ->schema([
                        Grid::make(3)->schema([
                            Select::make('user_id')
                                ->relationship('user', 'name')
                                ->label('Nama Pemohon (Warga)')
                                ->required()
                                ->searchable()
                                ->preload(),

                            Select::make('letter_type_id')
                                ->label('Jenis Surat')
                                // Mengambil list jenis surat
                                ->options(LetterType::all()->pluck('name', 'id'))
                                ->required()
                                ->searchable()
                                ->preload()
                                ->live() // PENTING: Agar form di bawah langsung berubah saat ini dipilih
                                ->afterStateUpdated(function ($state, callable $set) {
                                    // Opsional: Reset field dinamis jika ganti surat
                                    // $set('data.keperluan', null);
                                }),

                            Select::make('status')
                                ->options([
                                    'pending' => 'Menunggu (Pending)',
                                    'processed' => 'Sedang Diproses',
                                    'completed' => 'Selesai / Siap Ambil',
                                    'rejected' => 'Ditolak',
                                ])
                                ->default('pending')
                                ->required()
                                ->label('Status Pengajuan'),
                        ]),
                    ]),

                // --- BAGIAN 2: FORMULIR DINAMIS ---
                Section::make('Langkah 2: Lengkapi Data Surat')
                    ->description(fn (Get $get) => $get('letter_type_id') 
                        ? 'Isi data sesuai KTP/KK. Field akan menyesuaikan jenis surat.' 
                        : 'Pilih Jenis Surat terlebih dahulu di atas.')
                    ->schema([
                        // --- DATA UMUM (Selalu Muncul) ---
                        TextInput::make('data.nama')->label('Nama Lengkap')->required(),
                        TextInput::make('data.nik')->label('NIK')->numeric()->length(16)->required(),
                        TextInput::make('data.ttl')->label('Tempat, Tanggal Lahir')->placeholder('Contoh: Cilacap, 17 Agustus 1990')->required(),
                        
                        Select::make('data.jenkel')
                            ->label('Jenis Kelamin')
                            ->options(['Laki-laki' => 'Laki-laki', 'Perempuan' => 'Perempuan'])
                            ->required(),

                        Select::make('data.agama')
                            ->label('Agama')
                            ->options([
                                'Islam' => 'Islam', 'Kristen' => 'Kristen', 'Katolik' => 'Katolik',
                                'Hindu' => 'Hindu', 'Buddha' => 'Buddha', 'Konghucu' => 'Konghucu'
                            ])
                            ->required(),

                        TextInput::make('data.pekerjaan')->label('Pekerjaan')->required(),

                        Select::make('data.status')
                            ->label('Status Perkawinan')
                            ->options([
                                'Belum Kawin' => 'Belum Kawin', 'Kawin' => 'Kawin',
                                'Cerai Hidup' => 'Cerai Hidup', 'Cerai Mati' => 'Cerai Mati'
                            ])
                            ->required(),

                        Textarea::make('data.alamat')->label('Alamat Lengkap')->rows(3)->columnSpanFull()->required(),

                        // --- FIELD KHUSUS (LOGIC DIPERBAIKI) ---

                        // 1. Keperluan (Muncul di SEMUA KECUALI kode BEDA)
                        TextInput::make('data.keperluan')
                            ->label('Keperluan Surat')
                            ->placeholder('Contoh: Persyaratan Melamar Pekerjaan')
                            ->required(fn (Get $get) => self::getLetterCode($get('letter_type_id')) !== 'BEDA')
                            ->columnSpanFull()
                            ->visible(fn (Get $get) => self::getLetterCode($get('letter_type_id')) !== 'BEDA'),

                        // 2. Penghasilan (HANYA MUNCUL JIKA KODE = PHSL atau SKTM)
                        TextInput::make('data.penghasilan')
                            ->label('Rata-rata Penghasilan (Rp)')
                            ->prefix('Rp')
                            ->numeric() // REVISI: Menggunakan numeric biasa agar tidak error
                            ->visible(fn (Get $get) => in_array(self::getLetterCode($get('letter_type_id')), ['PHSL', 'SKTM'])),

                        // 3. Masa Berlaku (HANYA MUNCUL JIKA KODE = SKCK)
                        TextInput::make('data.masa_berlaku')
                            ->label('Masa Berlaku')
                            ->default('1 (Satu) Bulan')
                            ->visible(fn (Get $get) => self::getLetterCode($get('letter_type_id')) === 'SKCK'),

                        // 4. Field Khusus Beda Nama (HANYA MUNCUL JIKA KODE = BEDA)
                        TextInput::make('data.nama_lama')
                            ->label('Nama Yang Tertulis (Salah)')
                            ->placeholder('Nama di dokumen lama')
                            ->visible(fn (Get $get) => self::getLetterCode($get('letter_type_id')) === 'BEDA'),
                        
                        TextInput::make('data.nama_baru')
                            ->label('Nama Yang Seharusnya (Benar)')
                            ->placeholder('Sesuai KTP/KK')
                            ->visible(fn (Get $get) => self::getLetterCode($get('letter_type_id')) === 'BEDA'),

                        // 5. Rekomendasi (HANYA MUNCUL JIKA KODE = REKO)
                        Textarea::make('data.keterangan_lain')
                            ->label('Isi Rekomendasi / Keterangan')
                            ->visible(fn (Get $get) => self::getLetterCode($get('letter_type_id')) === 'REKO')
                            ->columnSpanFull(),

                    ])->columns(2),
            ]);
    }

    // --- HELPER FUNCTION: DETEKSI KODE SURAT ---
    protected static function getLetterCode($letterTypeId)
    {
        if (!$letterTypeId) return null;
        
        $letterType = LetterType::find($letterTypeId);
        
        if (!$letterType) return null;

        // Menggunakan strtoupper agar 'skck' (kecil) tetap terbaca sebagai 'SKCK' (besar)
        return strtoupper($letterType->code);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('created_at')->label('Tanggal Masuk')->date('d M Y, H:i')->sortable(),
                TextColumn::make('letterType.name')
                    ->label('Jenis Layanan')
                    ->searchable()
                    ->weight('bold')
                    ->color('primary'),
                TextColumn::make('user.name')->label('Pemohon')->searchable(),
                TextColumn::make('status')
                    ->label('Status')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pending' => 'warning',
                        'processed' => 'info',
                        'completed' => 'success',
                        'rejected' => 'danger',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pending' => 'Menunggu',
                        'processed' => 'Diproses',
                        'completed' => 'Selesai',
                        'rejected' => 'Ditolak',
                        default => $state,
                    }),
            ])
            ->emptyStateHeading('Belum ada permohonan masuk')
            ->emptyStateDescription('Daftar pengajuan surat dari warga akan muncul di sini.')
            ->defaultSort('created_at', 'desc')
            
            ->actions([
                // --- AKSI CETAK WORD ---
                Tables\Actions\Action::make('cetak_word')
                    ->label('Cetak Word')
                    ->icon('heroicon-o-printer')
                    ->color('success')
                    ->action(function (LetterRequest $record) {
                        // 1. Cek Template
                        $templatePath = $record->letterType->template_file;
                        if (!$templatePath || !Storage::exists($templatePath)) {
                            Notification::make()->title('Gagal')->body('Template surat belum diupload!')->danger()->send();
                            return;
                        }

                        // 2. Load Template
                        $path = Storage::path($templatePath);
                        $templateProcessor = new TemplateProcessor($path);
                        
                        // 3. Siapkan Data (dengan fallback jika kosong)
                        $data = $record->data ?? [];
                        
                        // Fungsi helper kecil untuk set value
                        $set = fn($key, $val) => $templateProcessor->setValue($key, $val ?? '-');

                        // Mapping Data
                        $set('nama', $data['nama'] ?? $record->user->name);
                        $set('nik', $data['nik'] ?? '-');
                        $set('ttl', $data['ttl'] ?? '-');
                        $set('agama', $data['agama'] ?? '-');
                        $set('pekerjaan', $data['pekerjaan'] ?? '-');
                        $set('alamat', $data['alamat'] ?? '-');
                        $set('status_kawin', $data['status'] ?? '-'); 
                        $set('jenkel', $data['jenkel'] ?? '-');
                        
                        // Data Khusus
                        $set('keperluan', $data['keperluan'] ?? '-');
                        $set('masa_berlaku', $data['masa_berlaku'] ?? '-');
                        $set('nama_lama', $data['nama_lama'] ?? '-');
                        $set('nama_baru', $data['nama_baru'] ?? '-');
                        $set('keterangan_lain', $data['keterangan_lain'] ?? '-');

                        // Format Uang Penghasilan
                        $penghasilan = isset($data['penghasilan']) 
                            ? 'Rp ' . number_format((float)$data['penghasilan'], 0, ',', '.') 
                            : '-';
                        $templateProcessor->setValue('penghasilan', $penghasilan);

                        // Tanggal Hari Ini (Indonesia)
                        Carbon::setLocale('id');
                        $templateProcessor->setValue('tanggal_surat', Carbon::now()->isoFormat('D MMMM Y'));

                        // 4. Simpan & Download
                        $fileName = 'Surat_' . str_replace(' ', '_', $record->letterType->code) . '_' . time() . '.docx';
                        $tempPath = storage_path('app/public/' . $fileName);
                        $templateProcessor->saveAs($tempPath);

                        return response()->download($tempPath)->deleteFileAfterSend();
                    }),

                Tables\Actions\EditAction::make()->label('Proses'),
            ]);
    }
        
    public static function getRelations(): array { return []; }
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLetterRequests::route('/'),
            'create' => Pages\CreateLetterRequest::route('/create'),
            'edit' => Pages\EditLetterRequest::route('/{record}/edit'),
        ];
    }
}