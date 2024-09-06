<?php
namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Produk;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Hidden;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Checkbox;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ProdukResource\Pages;

class ProdukResource extends Resource
{
    protected static ?string $model = Produk::class;

    protected static ?string $navigationIcon = 'heroicon-o-cake';

    public static function form(Forms\Form $form): Forms\Form
{
    $isAdmin = auth()->user()->role === 'Admin';

    $schema = [
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
        TextInput::make('stok')
            ->numeric()
            ->label('Stok')
            ->required(),
        FileUpload::make('foto')
            ->disk('public')
            ->directory('produk')
            ->required()
            ->preserveFilenames()
            ->label('Foto Produk'),
        Hidden::make('kantin_id')
            ->default(auth()->user()->kantin_id) // Mengatur nilai default sesuai auth user
            ->required(),
    ];

    if ($isAdmin) {
        $schema[] = Checkbox::make('trending')
            ->label('Trending');
    }

    return $form->schema($schema);
}

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')->label('Nama Produk')
                ->searchable(),
                TextColumn::make('jenis')->label('Jenis'),
                TextColumn::make('harga')->label('Harga'),
                TextColumn::make('stok')->label('Stok')
                ->sortable(),
                ImageColumn::make('foto')->label('Gambar'),
                TextColumn::make('kantin.nama')->label('Kantin')->sortable()->searchable(),
                TextColumn::make('trending')
                ->label('Trending')
                ->sortable()
                ->formatStateUsing(function ($state) {
                    return $state ? 'Yes' : 'No';
                }),
            ])
            ->modifyQueryUsing(function (Builder $query) {
                if (auth()->user()->role === 'Kantin') {
                    $query->where('kantin_id', auth()->user()->kantin_id);
                }
                return $query;
            })
            ->filters([
                // Filter opsional
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            // Relasi opsional
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
