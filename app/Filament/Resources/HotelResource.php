<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Hotel;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HotelResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HotelResource\RelationManagers;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Hotel';
    protected static ?string $label = 'Hotel';

    public static function form(Form $form): Form
    {
        return $form
        ->schema([Card::make()
            ->schema([
                Forms\Components\TextInput::make('namahotel')
                    ->label(__('Nama Hotel'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(['0'=> 'Tidak Aktif',
                                '1'=> 'Aktif',]),
                Forms\Components\RichEditor::make('ket')
                    ->required(),
            ])
            ->columns(1)
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('namahotel'),
                Tables\Columns\TextColumn::make('ket'),
                Tables\Columns\TextColumn::make('status'),
                
            ])
            ->filters([
                //
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
            //
        ];
    }
    
    public static function getPages(): array
    {
        return [
            'index' => Pages\ListHotels::route('/'),
            'create' => Pages\CreateHotel::route('/create'),
            'edit' => Pages\EditHotel::route('/{record}/edit'),
        ];
    }    
}
