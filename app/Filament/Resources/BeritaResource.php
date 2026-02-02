<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str; // PENTING: Untuk bikin slug otomatis
use Filament\Forms\Set; // PENTING: Untuk set nilai otomatis

class BeritaResource extends Resource
{
    protected static ?string $model = Berita::class;

    // Ikon koran/dokumen
    protected static ?string $navigationIcon = 'heroicon-o-newspaper';

    // --- PENGATURAN LABEL (Bahasa Indonesia) ---
    protected static ?string $navigationLabel = 'Berita Desa';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita Desa';
    protected static ?int $navigationSort = 2; // Urutan kedua setelah Galeri
    // -------------------------------------------

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Konten Berita')
                    ->description('Tulis informasi atau pengumuman desa di sini.')
                    ->schema([
                        
                        // 1. Judul (Auto generate slug)
                        Forms\Components\TextInput::make('title')
                            ->label('Judul Berita')
                            ->required()
                            ->maxLength(255)
                            ->live(onBlur: true) // Saat kursor pindah, jalankan fungsi di bawah
                            ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),

                        // 2. Slug (URL)
                        Forms\Components\TextInput::make('slug')
                            ->label('Link URL (Slug)')
                            ->required()
                            ->disabled() // Tidak boleh diedit manual agar konsisten
                            ->dehydrated() // Tetap dikirim ke database meski disabled
                            ->unique(Berita::class, 'slug', ignoreRecord: true),

                        // 3. Tanggal Terbit
                        Forms\Components\DatePicker::make('published_at')
                            ->label('Tanggal Terbit')
                            ->default(now())
                            ->required(),

                        // 4. Status Tayang
                        Forms\Components\Toggle::make('is_published')
                            ->label('Terbitkan Sekarang?')
                            ->default(true)
                            ->onColor('success')
                            ->offColor('danger'),

                        // 5. Upload Thumbnail
                        Forms\Components\FileUpload::make('thumbnail')
                            ->label('Gambar Sampul')
                            ->image()
                            ->directory('berita') // Disimpan di folder berita
                            ->required()
                            ->columnSpanFull(),

                        // 6. ISI BERITA (Rich Editor)
                        Forms\Components\RichEditor::make('content')
                            ->label('Isi Berita')
                            ->required()
                            ->columnSpanFull()
                            ->toolbarButtons([
                                'bold',
                                'italic',
                                'link',
                                'bulletList',
                                'orderedList',
                                'h2',
                                'h3',
                                'blockquote',
                                'undo',
                                'redo',
                            ]),
                    ])
                    ->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Gambar Kecil
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('Sampul')
                    ->square(),

                // Judul
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold'),

                // Tanggal
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable(),

                // Status (Bisa diklik langsung di tabel)
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Tayang'),
            ])
            ->filters([
                //
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
            'index' => Pages\ListBeritas::route('/'),
            'create' => Pages\CreateBerita::route('/create'),
            'edit' => Pages\EditBerita::route('/{record}/edit'),
        ];
    }
}