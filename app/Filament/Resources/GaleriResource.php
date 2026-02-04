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

    // Ikon di menu sidebar
    protected static ?string $navigationIcon = 'heroicon-o-photo';
    
    // Label di Sidebar Menu
    protected static ?string $navigationLabel = 'Galeri Desa';
    
    // Urutan menu di sidebar
    protected static ?int $navigationSort = 1;

    // --- PENGATURAN LABEL DIKSI ---
    protected static ?string $modelLabel = 'Galeri';
    protected static ?string $pluralModelLabel = 'Galeri Desa';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Input Data Galeri')
                    ->description('Silakan isi data dokumentasi kegiatan desa di sini.')
                    ->schema([
                        // Upload Gambar (Paling atas agar fokus utama)
                        Forms\Components\FileUpload::make('image')
                            ->label('Foto Dokumentasi')
                            ->image()
                            ->directory('galeri')
                            ->required()
                            ->columnSpanFull()
                            ->imageEditor() // Fitur crop/edit bawaan Filament
                            ->downloadable()
                            ->previewable(true),

                        Forms\Components\Grid::make(2)
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
                            ]),

                        // 3. Deskripsi
                        Forms\Components\Textarea::make('description')
                            ->label('Deskripsi Singkat')
                            ->rows(3)
                            ->columnSpanFull()
                            ->placeholder('Jelaskan sedikit tentang kegiatan ini...'),

                        // 4. Status Tayang
                        Forms\Components\Toggle::make('is_active')
                            ->label('Tampilkan di Website?')
                            ->default(true)
                            ->onColor('success')
                            ->helperText('Jika dimatikan, foto tidak akan muncul di halaman depan.'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            // --- UPGRADE: MENGGUNAKAN GRID LAYOUT (KARTU) ---
            ->contentGrid([
                'md' => 2, // 2 kolom di tablet
                'xl' => 3, // 3 kolom di layar besar
            ])
            ->columns([
                Tables\Columns\Layout\Stack::make([
                    // Gambar Full Width di dalam Kartu
                    Tables\Columns\ImageColumn::make('image')
                        ->height('200px')
                        ->width('100%')
                        ->extraImgAttributes(['class' => 'object-cover rounded-t-xl']), // CSS Rounded atas

                    // Bagian Teks di bawah gambar
                    Tables\Columns\Layout\Stack::make([
                        Tables\Columns\TextColumn::make('title')
                            ->weight('bold')
                            ->size('lg')
                            ->limit(30)
                            ->tooltip(fn (Galeri $record): string => $record->title),
                        
                        Tables\Columns\TextColumn::make('category')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'Kegiatan Desa' => 'info',
                                'Pembangunan' => 'warning',
                                'Wisata Alam' => 'success',
                                'Seni Budaya' => 'danger',
                                default => 'gray',
                            }),
                        
                        Tables\Columns\TextColumn::make('created_at')
                            ->date('d M Y')
                            ->color('gray')
                            ->size('sm')
                            ->icon('heroicon-m-calendar'),
                            
                    ])->space(2)->extraAttributes(['class' => 'p-4']), // Padding konten teks
                ])->space(0),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->label('Filter Kategori')
                    ->options([
                        'Kegiatan Desa' => 'Kegiatan Desa',
                        'Pembangunan' => 'Pembangunan',
                        'Wisata Alam' => 'Wisata Alam',
                        'Seni Budaya' => 'Seni Budaya',
                        'Layanan' => 'Layanan Masyarakat',
                    ]),
                Tables\Filters\TernaryFilter::make('is_active')
                    ->label('Status Tayang'),
            ])
            ->actions([
                // Menggunakan ActionGroup agar tombol edit/delete rapi dalam menu dropdown
                Tables\Actions\ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                ->icon('heroicon-m-ellipsis-horizontal')
                ->tooltip('Menu Aksi'),
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