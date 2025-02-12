<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Set;
use Filament\Forms\Form;
use App\Models\Jenispaket;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Card;
use Filament\Tables\Actions\ActionGroup;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\JenispaketResource\Pages;
use App\Filament\Resources\JenispaketResource\RelationManagers;
 

class JenispaketResource extends Resource
{
    protected static ?string $model = Jenispaket::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'Master';
    protected static ?string $navigationLabel = 'Jenis Paket';
    protected static ?string $label = 'Jenis Paket';
   
    public static function form(Form $form): Form
    {
         
        return $form
            ->schema([Card::make()
                ->schema([
                    Forms\Components\TextInput::make('namajenis')
                        ->label(__('Nama Jenis Paket'))
                        ->required()
                        ->maxLength(255)
                        ->live(onBlur:true)
                        ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation ==='create'? $set('alias',Str::slug($state)): null ),
                    Forms\Components\TextInput::make('alias')
                        ->required()
                        ->unique(Jenispaket::class, 'alias', ignoreRecord:true)
                        ->disabled()
                        ->dehydrated()
                        ->maxLength(255),
                    Forms\Components\TextInput::make('lamahari')
                        ->required()
                        ->label(__('Berapa Lama'))
                        ->suffix('hari')
                        ->numeric()
                        ->minValue(1)
                        ->maxValue(100),
                    Forms\Components\Toggle::make('status')
                        ->default(1)
                        ->label('Is Active'),
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
                ActionGroup::make([
                    Tables\Actions\EditAction::make(),
                    Tables\Actions\DeleteAction::make(),
                ])
                
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
