<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GaleriResource\Pages;
use App\Models\Galeri;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GaleriResource extends Resource
{
    protected static ?string $model = Galeri::class;

    // Ikon di menu sidebar (bisa diganti heroicon lain)
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    // Label di Sidebar Menu
    protected static ?string $navigationLabel = 'Galeri Desa';
    
    // Urutan menu di sidebar
    protected static ?int $navigationSort = 1;

    // --- PENGATURAN LABEL DIKSI (Agar tidak "Create Galeri" tapi "Buat Galeri") ---
    
    // Label untuk satu item (Singular) -> Misal: "Galeri"
    protected static ?string $modelLabel = 'Galeri';

    // Label untuk banyak item (Plural) -> Misal: "Galeri Desa"
    protected static ?string $pluralModelLabel = 'Galeri Desa';

    // -------------------------------------------------------------------------------

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // Menggunakan Section/Card untuk membungkus form
                Forms\Components\Section::make('Input Data Galeri')
                    ->description('Silakan isi data dokumentasi kegiatan desa di sini.')
                    ->schema([
                        
                        // 1. Judul
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Kegiatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Kerja Bakti Dusun Krajan'),

                        // 2. Kategori
                        Forms\Components\Select::make('category')
                            ->label('Kategori')
                            ->options([
                                'Kegiatan Desa' => 'Kegiatan Desa',
                                'Pembangunan' => 'Pembangunan',
                                'Wisata Alam' => 'Wisata Alam',
                                'Seni Budaya' => 'Seni Budaya',
                                'Layanan' => 'Layanan Masyarakat',
                            ])
                            ->required()
                            ->native(false),

                        // 3. Upload Gambar
                        Forms\Components\FileUpload::make('image')
                            ->label('Foto Dokumentasi')
                            ->image() // Validasi harus gambar
                            ->directory('galeri') // Disimpan di storage/app/public/galeri
                            ->required()
                            ->columnSpanFull() // Lebar penuh
                            ->previewable(true),

                        // 4. Deskripsi
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Jelaskan sedikit tentang kegiatan ini...'),

                        // 5. Status Tayang
                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Website?')
                            ->default(true)
                            ->helperText('Jika dimatikan, foto tidak akan muncul di halaman depan.'),
                    ])
                    ->columns(2), // Layout 2 kolom
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // 1. Preview Gambar Kecil
                Tables\Columns\ImageColumn::make('image')
                    ->label('Foto')
                    ->square(),

                // 2. Judul
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->weight('bold'),

                // 3. Kategori dengan Badge Warna
                Tables\Columns\TextColumn::make('category')
                    ->label('Kategori')
                    ->sortable()
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'Kegiatan Desa' => 'info',     // Biru
                        'Pembangunan' => 'warning',    // Kuning
                        'Wisata Alam' => 'success',    // Hijau
                        'Seni Budaya' => 'danger',     // Merah
                        default => 'gray',
                    }),

                // 4. Switch On/Off langsung di tabel
                Tables\Columns\ToggleColumn::make('is_active')
                    ->label('Tayang'),

                // 5. Tanggal Upload
                Tables\Columns\TextColumn::make('created_at')
                    ->label('Tanggal')
                    ->dateTime('d M Y')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                // Filter berdasarkan status tayang (opsional)
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Tayang'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListGaleris::route('/'),
            'create' => Pages\CreateGaleri::route('/create'),
            'edit' => Pages\EditGaleri::route('/{record}/edit'),
        ];
    }
}