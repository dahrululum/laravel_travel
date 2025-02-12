<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Jenispaket;
use Filament\Resources\Form;
use Filament\Resources\Table;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JenispaketResource\Pages;
use App\Filament\Resources\JenispaketResource\RelationManagers;

class JenispaketResource extends Resource
{
    protected static ?string $model = Jenispaket::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Jenis Paket';
    protected static ?string $label = 'Jenis Paket';
   
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
                    Forms\Components\TextInput::make('namajenis')
                        ->label(__('Nama Jenis Paket'))
                        ->required()
                        ->maxLength(255),
                    
                    Forms\Components\TextInput::make('lamahari')
                        ->required()
                        ->label(__('Berapa Lama'))
                        ->suffix('hari')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(100),
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
                Tables\Columns\TextColumn::make('namajenis')->label('Nama Jenis'),
                
                Tables\Columns\TextColumn::make('lamahari')->label('Berapa Lama'),
                
                 
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
            'index' => Pages\ListJenispakets::route('/'),
            'create' => Pages\CreateJenispaket::route('/create'),
            'edit' => Pages\EditJenispaket::route('/{record}/edit'),
        ];
    }    
}
