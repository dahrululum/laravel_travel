<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Maskapai;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\MaskapaiResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\MaskapaiResource\RelationManagers;

class MaskapaiResource extends Resource
{
    protected static ?string $model = Maskapai::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Maskapai';
    protected static ?string $label = 'Maskapai';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([Card::make()
            ->schema([
                Forms\Components\TextInput::make('namamaskapai')
                    ->label(__('Nama Maskapai'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('bandara')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(['0'=> 'Tidak Aktif',
                                '1'=> 'Aktif',]),
                Forms\Components\RichEditor::make('ket')
                    ->required(),
            ])->columns(1)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('namamaskapai'),
                Tables\Columns\TextColumn::make('bandara'),
                 
               
                
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListMaskapais::route('/'),
            'create' => Pages\CreateMaskapai::route('/create'),
            'edit' => Pages\EditMaskapai::route('/{record}/edit'),
        ];
    }    
}
