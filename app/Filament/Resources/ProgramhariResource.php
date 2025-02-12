<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProgramhariResource\Pages;
use App\Filament\Resources\ProgramhariResource\RelationManagers;
use App\Models\Programhari;
use Filament\Forms;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProgramhariResource extends Resource
{
    protected static ?string $model = Programhari::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Program Hari';
    protected static ?string $label = 'Program Hari';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('namaprogram')
                ->label(__('Nama Program Hari'))
                    ->required()
                    ->maxLength(255),
                Forms\Components\Select::make('status')
                    ->options(['0'=> 'Tidak Aktif',
                                '1'=> 'Aktif',]),
                Forms\Components\RichEditor::make('ket')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('namaprogram'),
                Tables\Columns\TextColumn::make('ket'),
                Tables\Columns\TextColumn::make('status'),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime(),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime(),
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
            'index' => Pages\ListProgramharis::route('/'),
            'create' => Pages\CreateProgramhari::route('/create'),
            'edit' => Pages\EditProgramhari::route('/{record}/edit'),
        ];
    }    
}
