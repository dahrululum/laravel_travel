<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Hotel;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\HotelResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\HotelResource\RelationManagers;

class HotelResource extends Resource
{
    protected static ?string $model = Hotel::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
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
                Forms\Components\FileUpload::make('foto')
                    ->image()
                    ->directory('hotels'),
                Forms\Components\Toggle::make('status')
                    ->default(1)
                    ->label('Is Active'),
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
                Tables\Columns\TextColumn::make('namahotel')->label('Nama Hotel'),
                Tables\Columns\ImageColumn::make('foto'),
                Tables\Columns\TextColumn::make('ket')->label('Deskripsi')->formatStateUsing(fn (string $state): HtmlString => new HtmlString($state)),
                Tables\Columns\IconColumn::make('status')->boolean(),
                
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
