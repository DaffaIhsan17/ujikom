<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Pesanan;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Tables\Actions\Action;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\PesananResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PesananResource\RelationManagers;

class PesananResource extends Resource
{
    protected static ?string $model = Pesanan::class;

    protected static ?string $navigationIcon = 'heroicon-o-shopping-cart';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('status'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama'),
                TextColumn::make('siswa.nama')
                ->label('Pemesan')
                ->searchable(),
                TextColumn::make('harga'),
                ImageColumn::make('foto')
                ->label('Foto')
                ->size(50)
                ->circular(),
                TextColumn::make('level'),
                TextColumn::make('jumlah'),
                TextColumn::make('status')
                ->sortable(),
                ])
                ->modifyQueryUsing(function (Builder $query) {
                    if (auth()->user()->role === 'kantin') {
                        $query->where('kantin_id', auth()->user()->kantin_id);
                    }
                    return $query;
                })
            
            ->filters([
                
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Action::make('selesai')
                    ->label('Selesai')
                    ->icon('heroicon-o-check')
                    ->action(function (Pesanan $record) {
                        $record->update(['status' => 'Selesai, silahkan di ambil ke Kantin.']);
                    })
                    ->requiresConfirmation()
                    ->color('success'),
                Action::make('gagal')
                    ->label('Gagalkan')
                    ->icon('heroicon-o-x-mark')
                    ->action(function (Pesanan $record) {
                        $record->update(['status' => 'Gagal, mohon maaf produk sedang tidak tersedia.']);
                    })
                    ->requiresConfirmation()
                    ->color('danger'),
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
            'index' => Pages\ListPesanans::route('/'),
            'create' => Pages\CreatePesanan::route('/create'),
            'edit' => Pages\EditPesanan::route('/{record}/edit'),
        ];
    }
}
