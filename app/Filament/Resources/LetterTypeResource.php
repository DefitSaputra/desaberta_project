<?php

namespace App\Filament\Resources;

use App\Filament\Resources\LetterTypeResource\Pages;
use App\Models\LetterType;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section; // Ganti Card jadi Section
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\TextColumn;

class LetterTypeResource extends Resource
{
    protected static ?string $model = LetterType::class;

    protected static ?string $navigationIcon = 'heroicon-o-folder';
    
    // --- PERBAIKAN 1: LABEL YANG KONSISTEN & BERSIH ---
    protected static ?string $modelLabel = 'Jenis Surat';
    protected static ?string $pluralModelLabel = 'Jenis Surat'; // Hapus kata 'Master'
    protected static ?string $navigationLabel = 'Jenis Surat';
    protected static ?string $navigationGroup = 'Master Data';
    protected static ?int $navigationSort = 1;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                // --- PERBAIKAN 2: GUNAKAN SECTION (Lebih Modern) ---
                Section::make('Detail Template Surat')
                    ->description('Upload file Word (.docx) yang sudah berisi variabel ${nama}, ${nik}, dll.')
                    ->schema([
                        TextInput::make('name')
                            ->label('Nama Surat')
                            ->placeholder('Contoh: Surat Pengantar SKCK')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('code')
                            ->label('Kode Surat (Unik)')
                            ->placeholder('Contoh: SKCK')
                            ->helperText('Wajib HURUF BESAR tanpa spasi (misal: SKCK, DOMISILI, KADES).')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->maxLength(255),

                        FileUpload::make('template_file')
                            ->label('File Template Word (.docx)')
                            ->directory('templates') // Disimpan di storage/app/public/templates
                            ->acceptedFileTypes(['application/vnd.openxmlformats-officedocument.wordprocessingml.document'])
                            ->required()
                            ->columnSpanFull(),
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nama Layanan')
                    ->searchable()
                    ->sortable()
                    ->weight('bold')
                    ->icon('heroicon-o-document-text')
                    ->color('primary'),

                TextColumn::make('code')
                    ->label('Kode Sistem')
                    ->badge()
                    ->color('gray')
                    ->sortable(),

                TextColumn::make('created_at')
                    ->label('Terakhir Update')
                    ->date('d M Y')
                    ->sortable(),
            ])
            // --- PERBAIKAN 3: TAMPILAN SAAT KOSONG (Empty State) ---
            ->emptyStateHeading('Belum ada jenis surat')
            ->emptyStateDescription('Silakan tambahkan template surat baru untuk memulai layanan.')
            ->emptyStateIcon('heroicon-o-document-plus')
            
            ->filters([])
            ->actions([
                // --- PERBAIKAN 4: TOMBOL BAHASA INDONESIA ---
                Tables\Actions\EditAction::make()->label('Ubah'),
                Tables\Actions\DeleteAction::make()->label('Hapus'),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListLetterTypes::route('/'),
            'create' => Pages\CreateLetterType::route('/create'),
            'edit' => Pages\EditLetterType::route('/{record}/edit'),
        ];
    }
}