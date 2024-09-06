<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SiswaResource\Pages;
use App\Filament\Resources\SiswaResource\RelationManagers;
use App\Models\Siswa;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Columns\ImageColumn;
use Filament\Forms\Components\TextInput;
use Illuminate\Support\Facades\Hash;



class SiswaResource extends Resource
{
    protected static ?string $model = Siswa::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function getNavigationLabel(): string
    {
        return "Siswa";
    } 


    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nama')
                    ->label('Nama')
                    ->placeholder('Nama Siswa')
                    ->required(),
                Forms\Components\TextInput::make('nisn')
                    ->label('NISN')
                    ->placeholder('NISN')
                    ->required(),
                    TextInput::make('password')
                    ->password()
                    ->revealable()
                    ->dehydrateStateUsing(fn (string $state): string => Hash::make($state))
                    ->required(),
            ]);
    }

    protected function mutateFormDataBeforeCreate(array $data): array
{
    \Log::info('Data yang akan disimpan:', $data);
    return $data;
}


    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nama')
                    ->label('Nama Siswa'),
                Tables\Columns\TextColumn::make('nisn')
                    ->label('NISN'),

            ])
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
            'index' => Pages\ListSiswas::route('/'),
            'create' => Pages\CreateSiswa::route('/create'),
            'edit' => Pages\EditSiswa::route('/{record}/edit'),
        ];
    }

    public static function getCreateButtonLabel(): string
    {
        return 'Tambahkan Data';
    }
}
