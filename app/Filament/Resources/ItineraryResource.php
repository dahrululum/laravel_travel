<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Itinerary;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\ItineraryResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\ItineraryResource\RelationManagers;

class ItineraryResource extends Resource
{
    protected static ?string $model = Itinerary::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Itinerary';
    protected static ?string $label = 'Itinerary';
    public static function form(Form $form): Form
    {
        return $form
        ->schema([Card::make()
            ->schema([
              
                Forms\Components\TextInput::make('hari')
                    ->label(__('Hari ke :'))
                    ->required()
                    ->maxLength(255),
                
                Forms\Components\TextInput::make('lokasi')
                    ->required()
                    ->label(__('Lokasi'))
                    ->maxLength(255),
                Forms\Components\TextInput::make('rute')
                    ->required()
                    ->label(__('Rute'))
                    ->maxLength(255),
                Forms\Components\RichEditor::make('ket')
                    ->required(),
                Forms\Components\Select::make('status')
                    ->options(['0'=> 'Tidak Aktif',
                                '1'=> 'Aktif',]),

                ])->columns(1)
        
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('hari')->label('Hari Ke:'),
                Tables\Columns\TextColumn::make('lokasi')->label('Lokasi'),
                Tables\Columns\TextColumn::make('rute')->label('Rute'),
                
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
            'index' => Pages\ListItineraries::route('/'),
            'create' => Pages\CreateItinerary::route('/create'),
            'edit' => Pages\EditItinerary::route('/{record}/edit'),
        ];
    }    
}
