<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Persyaratan;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PersyaratanResource\Pages;
use App\Filament\Resources\PersyaratanResource\RelationManagers;

class PersyaratanResource extends Resource
{
    protected static ?string $model = Persyaratan::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Persyaratan';
    protected static ?string $label = 'Persyaratan';

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
                Forms\Components\Select::make('tipe')
                    ->options(['1'=> 'Peserta ',
                                '2'=> 'Umum',]),
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
                Tables\Columns\TextColumn::make('tipe'),
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
            'index' => Pages\ListPersyaratans::route('/'),
            'create' => Pages\CreatePersyaratan::route('/create'),
            'edit' => Pages\EditPersyaratan::route('/{record}/edit'),
        ];
    }    
}
