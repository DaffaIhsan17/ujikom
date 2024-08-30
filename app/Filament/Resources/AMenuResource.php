<?php

namespace App\Filament\Resources;

use App\Filament\Resources\MenuResource\Pages;
use App\Models\Menu;
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

class MenuResource extends Resource
{
    protected static ?string $model = Menu::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Card::make()->schema([
                TextInput::make('nama')
                    ->label('Nama Menu')
                    ->required(),
                TextInput::make('jenis')
                    ->label('Jenis')
                    ->required(),
                TextInput::make('harga')
                    ->numeric()
                    ->label('Harga')
                    ->required(),
                FileUpload::make('foto')
                    ->disk('public')
                    ->directory('menu')
                    ->label('Foto Menu'),
                Select::make('kantin_id')
                    ->label('Pilih Kantin')
                    ->relationship('kantin', 'nama') // Menggunakan relasi yang benar
                    ->preload()
                    ->required(),
            ]),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
{
    return $table
        ->columns([
            TextColumn::make('nama')
                ->label('Nama Menu'),
            TextColumn::make('jenis')
                ->label('Jenis'),
            TextColumn::make('harga')
                ->label('Harga'),
            ImageColumn::make('foto')
                ->label('Gambar'),
            TextColumn::make('kantin.nama')
                ->label('Kantin')
                ->sortable()
                ->searchable(),
        ])
        ->modifyQueryUsing(function (Builder $query) {
            // Hanya menampilkan menu dari kantin yang terkait dengan user yang sedang login
            if (auth()->user()->role === 'kantin') {
                return $query->where('kantin_id', auth()->user()->id);
            }
            return $query;
        })
        ->actions([
            Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListMenus::route('/'),
            'create' => Pages\CreateMenu::route('/create'),
            'edit' => Pages\EditMenu::route('/{record}/edit'),
        ];
    }

    public static function canCreate(): bool
{
    return auth()->user()->can('create', Menu::class);
}

}
