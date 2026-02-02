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
                Section::make('Input Data Statistik')
                    ->schema([
                        // 1. Pilih Kategori Data
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
                            ->native(false),

                        // 2. Nama Label (Misal: Petani, Islam, 0-4 Tahun)
                        Forms\Components\TextInput::make('label')
                            ->label('Nama Kelompok / Kategori')
                            ->placeholder('Contoh: Petani, Islam, atau 0-4 Tahun')
                            ->required(),

                        // 3. Input Angka
                        Forms\Components\Grid::make(3)
                            ->schema([
                                Forms\Components\TextInput::make('jumlah_laki')
                                    ->label('Laki-laki')
                                    ->numeric()
                                    ->default(0),
                                
                                Forms\Components\TextInput::make('jumlah_perempuan')
                                    ->label('Perempuan')
                                    ->numeric()
                                    ->default(0),

                                Forms\Components\TextInput::make('jumlah_total')
                                    ->label('Total (Otomatis)')
                                    ->numeric()
                                    ->helperText('Kosongkan jika ingin dihitung otomatis dari L + P')
                                    ->default(0),
                            ]),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('kategori')
                    ->label('Jenis Data')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        'pekerjaan' => 'info',
                        'agama' => 'success',
                        'umur' => 'warning',
                        'pendidikan' => 'danger',
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

                Tables\Columns\TextColumn::make('label')
                    ->label('Kelompok')
                    ->searchable()
                    ->weight('bold'),

                Tables\Columns\TextColumn::make('jumlah_laki')
                    ->label('L')
                    ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Total L')),

                Tables\Columns\TextColumn::make('jumlah_perempuan')
                    ->label('P')
                    ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Total P')),

                Tables\Columns\TextColumn::make('jumlah_total')
                    ->label('Total')
                    ->weight('bold')
                    ->summarize(Tables\Columns\Summarizers\Sum::make()->label('Grand Total')),
            ])
            ->defaultGroup('kategori') // Mengelompokkan tabel berdasarkan kategori agar rapi
            ->filters([
                Tables\Filters\SelectFilter::make('kategori')
                    ->options([
                        'pekerjaan' => 'Pekerjaan',
                        'status_kawin' => 'Status Perkawinan',
                        'agama' => 'Agama',
                        'umur' => 'Kelompok Umur',
                        'pendidikan' => 'Pendidikan',
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