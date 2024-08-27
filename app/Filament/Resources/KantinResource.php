<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Kantin;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Select;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\KantinResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class KantinResource extends Resource
{
    protected static ?string $model = Kantin::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make()->schema([
                    TextInput::make('nama')
                        ->label('Nama Kantin')
                        ->required(),
                    TextInput::make('pemilik')
                        ->label('Pemilik')
                        ->required(),
                    Select::make('kategori')
                        ->label('Kategori')
                        ->options([
                            'Makanan' => 'Makanan',
                            'Minuman' => 'Minuman',
                            'Makanan & Minuman' => 'Makanan & Minuman',
                        ])
                        ->native(false)
                        ->required(),
                    FileUpload::make('img')
                        ->disk('public')
                        ->directory('kantin')
                        ->label('Gambar'),
                ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama')
                    ->label('Nama Kantin'),
                TextColumn::make('pemilik'),
                TextColumn::make('kategori'),
                ImageColumn::make('img')
                    ->label('Gambar'),
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
            'index' => Pages\ListKantins::route('/'),
            'create' => Pages\CreateKantin::route('/create'),
            'edit' => Pages\EditKantin::route('/{record}/edit'),
        ];
    }
}
