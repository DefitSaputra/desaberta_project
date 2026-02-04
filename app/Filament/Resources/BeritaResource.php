<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BeritaResource\Pages;
use App\Models\Berita;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Forms\Set;

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
                // --- KOLOM KIRI (KONTEN UTAMA) ---
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                // 1. Judul
                                Forms\Components\TextInput::make('title')
                                    ->label('Judul Berita')
                                    ->required()
                                    ->maxLength(255)
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state)))
                                    ->placeholder('Masukkan judul berita menarik...'),

                                // 2. Slug
                                Forms\Components\TextInput::make('slug')
                                    ->label('Permalink')
                                    ->disabled()
                                    ->dehydrated()
                                    ->unique(Berita::class, 'slug', ignoreRecord: true)
                                    ->prefix(url('/berita/').'/'),

                                // 6. Isi Berita
                                Forms\Components\RichEditor::make('content')
                                    ->label('Konten Berita')
                                    ->required()
                                    ->fileAttachmentsDirectory('berita/attachments') // Agar gambar dalam teks rapi
                                    ->columnSpanFull()
                                    ->toolbarButtons([
                                        'bold', 'italic', 'link', 'bulletList', 'orderedList',
                                        'h2', 'h3', 'blockquote', 'undo', 'redo',
                                    ]),
                            ]),
                    ])
                    ->columnSpan(['lg' => 2]), // Lebar 2/3 pada layar besar

                // --- KOLOM KANAN (SIDEBAR PENGATURAN) ---
                Forms\Components\Group::make()
                    ->schema([
                        
                        // Section Status & Tanggal
                        Forms\Components\Section::make('Publikasi')
                            ->schema([
                                // 4. Status Tayang
                                Forms\Components\Toggle::make('is_published')
                                    ->label('Terbitkan')
                                    ->helperText('Berita akan tampil di website jika aktif.')
                                    ->default(true)
                                    ->onColor('success')
                                    ->offColor('danger'),

                                // 3. Tanggal Terbit
                                Forms\Components\DatePicker::make('published_at')
                                    ->label('Tanggal Terbit')
                                    ->default(now())
                                    ->required(),
                            ]),

                        // Section Gambar
                        Forms\Components\Section::make('Media')
                            ->schema([
                                // 5. Upload Thumbnail
                                Forms\Components\FileUpload::make('thumbnail')
                                    ->label('Gambar Sampul')
                                    ->image()
                                    ->imageEditor() // Tambahan fitur crop/edit ringan
                                    ->directory('berita')
                                    ->required()
                                    ->columnSpanFull(),
                            ]),
                    ])
                    ->columnSpan(['lg' => 1]), // Lebar 1/3 pada layar besar
            ])
            ->columns(3); // Total grid layout 3 kolom
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Gambar Thumbnail Bulat
                Tables\Columns\ImageColumn::make('thumbnail')
                    ->label('')
                    ->circular(),

                // Judul & Deskripsi Singkat
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul Berita')
                    ->searchable()
                    ->sortable()
                    ->limit(50)
                    ->weight('bold')
                    ->description(fn (Berita $record): string => Str::limit(strip_tags($record->content), 40)), // Tampilkan cuplikan isi di bawah judul

                // Tanggal dengan Badge
                Tables\Columns\TextColumn::make('published_at')
                    ->label('Tanggal')
                    ->date('d M Y')
                    ->sortable()
                    ->badge()
                    ->color('gray'),

                // Toggle Switch Langsung di Tabel
                Tables\Columns\ToggleColumn::make('is_published')
                    ->label('Live'),
            ])
            ->defaultSort('published_at', 'desc') // Urutkan dari yang terbaru
            ->filters([
                // Filter status publikasi
                Tables\Filters\TernaryFilter::make('is_published')
                    ->label('Status Publikasi'),
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