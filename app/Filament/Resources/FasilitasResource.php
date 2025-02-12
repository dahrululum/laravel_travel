<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Fasilitas;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use App\Filament\Resources\FasilitasResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\FasilitasResource\RelationManagers;

class FasilitasResource extends Resource
{
    protected static ?string $model = Fasilitas::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Fasilitas';
    protected static ?string $label = 'Fasilitas';

    public static function form(Form $form): Form
    {
        $alias=uniqid();
        return $form
        ->schema([Card::make()
            ->schema([
                Forms\Components\TextInput::make('alias')
                    ->required()
                    ->default($alias)
                    ->disabled()
                    ->maxLength(100),
                Forms\Components\RichEditor::make('isi')
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
                Tables\Columns\TextColumn::make('alias'),
                Tables\Columns\TextColumn::make('isi'),
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
            'index' => Pages\ListFasilitas::route('/'),
            'create' => Pages\CreateFasilitas::route('/create'),
            'edit' => Pages\EditFasilitas::route('/{record}/edit'),
        ];
    }    
}
