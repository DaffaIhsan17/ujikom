<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProdukResource\Pages;
use App\Models\Produk;
use Filament\Forms;
use Filament\Tables;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Card::make()->schema([
                TextInput::make('nama')
                    ->label('Nama Produk')
                    ->required(),
                    Select::make('jenis')
                    ->label('Kategori')
                    ->options([
                        'Makanan' => 'Makanan',
                        'Minuman' => 'Minuman',
                    ])
                    ->native(false)
                    ->required(),
                TextInput::make('harga')
                    ->numeric()
                    ->label('Harga')
                    ->required(),
                FileUpload::make('foto')
                    ->disk('public')
                    ->directory('produk')
                    ->required()
                    ->label('Foto Produk'),
                    TextInput::make('kantin_nama')
                    ->label('Nama Kantin')
                    ->default(function () {
                        return auth()->user()->kantin->nama;
                    })
                    ->disabled()
                    ->required(),

                            ]),
        ]);
    }   

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Produk'),
                TextColumn::make('jenis')
                    ->label('Jenis'),
                TextColumn::make('harga')
                    ->label('Harga'),
                ImageColumn::make('foto')
                    ->label('Gambar'),
                TextColumn::make('kantins.nama')
                    ->label('Kantin')
                    ->sortable()
                    ->searchable(),
                    ])
                    ->modifyQueryUsing(function (Builder $query) {
                        if (auth()->user()->role === 'kantin') {
                            return $query->whereHas('kantins', function ($query) {
                                $query->where('kantins.id', auth()->user()->kantin_id);
                            });
                        }
                        return $query;
                    })
                    
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListProduks::route('/'),
            'create' => Pages\CreateProduk::route('/create'),
            'edit' => Pages\EditProduk::route('/{record}/edit'),
        ];
    }
}
