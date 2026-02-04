<?php

namespace App\Filament\Resources;

use App\Filament\Resources\StatistikPendudukResource\Pages;
use App\Models\StatistikPenduduk;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Forms\Components\Section;
use Filament\Support\Enums\FontWeight;

class StatistikPendudukResource extends Resource
{
    protected static ?string $model = StatistikPenduduk::class;

    protected static ?string $navigationIcon = 'heroicon-o-chart-bar';
    protected static ?string $navigationLabel = 'Data Statistik';
    protected static ?string $modelLabel = 'Data Statistik';
    protected static ?string $pluralModelLabel = 'Data Statistik Desa';
    protected static ?int $navigationSort = 3;

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Detail Kategori')
                    ->description('Tentukan jenis data statistik yang akan diinput.')
                    ->schema([
                        Forms\Components\Grid::make(2)
                            ->schema([
                                // 1. Pilih Kategori
                                Forms\Components\Select::make('kategori')
                                    ->label('Jenis Data')
                                    ->options([
                                        'pekerjaan' => 'Pekerjaan',
                                        'status_kawin' => 'Status Perkawinan',
                                        'agama' => 'Agama',
                                        'umur' => 'Kelompok Umur',
                                        'pendidikan' => 'Pendidikan',
                                        'kabupaten' => 'Agregat Penduduk',
                                    ])
                                    ->required()
                                    ->native(false)
                                    ->searchable(),

                                // 2. Nama Label
                                Forms\Components\TextInput::make('label')
                                    ->label('Nama Kelompok')
                                    ->placeholder('Contoh: Petani, Islam, 0-4 Tahun')
                                    ->required(),
                            ]),
                    ]),

                Section::make('Data Angka')
                    ->description('Masukkan jumlah penduduk berdasarkan jenis kelamin. Total akan dihitung otomatis.')
                    ->schema([
                        Forms\Components\Group::make()
                            ->schema([
                                // 3. Input Laki-laki (Reactive)
                                Forms\Components\TextInput::make('jumlah_laki')
                                    ->label('Laki-laki')
                                    ->numeric()
                                    ->default(0)
                                    ->prefixIcon('heroicon-m-user') // Ikon user
                                    ->live(onBlur: true) // Update saat pindah kursor
                                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set) {
                                        // Hitung total otomatis
                                        $l = (int) $get('jumlah_laki');
                                        $p = (int) $get('jumlah_perempuan');
                                        $set('jumlah_total', $l + $p);
                                    }),

                                // 4. Input Perempuan (Reactive)
                                Forms\Components\TextInput::make('jumlah_perempuan')
                                    ->label('Perempuan')
                                    ->numeric()
                                    ->default(0)
                                    ->prefixIcon('heroicon-m-user')
                                    ->live(onBlur: true)
                                    ->afterStateUpdated(function (Forms\Get $get, Forms\Set $set) {
                                        $l = (int) $get('jumlah_laki');
                                        $p = (int) $get('jumlah_perempuan');
                                        $set('jumlah_total', $l + $p);
                                    }),
                            ])->columns(2),

                        // 5. Input Total (Read Only / Otomatis)
                        Forms\Components\TextInput::make('jumlah_total')
                            ->label('Total Penduduk')
                            ->numeric()
                            ->readOnly() // Tidak bisa diedit manual agar akurat
                            ->helperText('Angka ini terhitung otomatis dari penjumlahan L + P.')
                            ->extraInputAttributes(['class' => 'bg-gray-100 font-bold text-lg']), // Styling khusus
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                // Kategori dengan Badge Warna
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Kategori')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pekerjaan' => 'info',
                        'agama' => 'success',
                        'umur' => 'warning',
                        'pendidikan' => 'danger',
                        'kabupaten' => 'primary',
                        default => 'gray',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        'pekerjaan' => 'Pekerjaan',
                        'status_kawin' => 'Status Kawin',
                        'agama' => 'Agama',
                        'umur' => 'Kelompok Umur',
                        'pendidikan' => 'Pendidikan',
                        'kabupaten' => 'Kabupaten',
                        default => $state,
                    })
                    ->sortable(),

                // Nama Label
                Tables\Columns\TextColumn::make('label')
                    ->label('Kelompok')
                    ->searchable()
                    ->weight(FontWeight::Bold),

                // Angka Laki-laki
                Tables\Columns\TextColumn::make('jumlah_laki')
                    ->label('Laki-laki')
                    ->numeric()
                    ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Total L')),

                // Angka Perempuan
                Tables\Columns\TextColumn::make('jumlah_perempuan')
                    ->label('Perempuan')
                    ->numeric()
                    ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Total P')),

                // Angka Total
                Tables\Columns\TextColumn::make('jumlah_total')
                    ->label('Total')
                    ->weight(FontWeight::Bold)
                    ->color('primary')
                    ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Grand Total')),
            ])
            ->defaultGroup('kategori') // Fitur grouping bawaan agar tabel rapi per kategori
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->label('Filter Kategori')
                    ->options([
                        'pekerjaan' => 'Pekerjaan',
                        'status_kawin' => 'Status Perkawinan',
                        'agama' => 'Agama',
                        'umur' => 'Kelompok Umur',
                        'pendidikan' => 'Pendidikan',
                        'kabupaten' => 'Agregat Penduduk',
                    ]),
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
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListStatistikPenduduks::route('/'),
            'create' => Pages\CreateStatistikPenduduk::route('/create'),
            'edit' => Pages\EditStatistikPenduduk::route('/{record}/edit'),
        ];
    }
}