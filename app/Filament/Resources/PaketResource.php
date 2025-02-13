<?php

namespace App\Filament\Resources;

use Filament\Forms;
use Filament\Tables;
use App\Models\Paket;
use Filament\Forms\Set;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Illuminate\Support\Str;
use Filament\Resources\Resource;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Illuminate\Database\Eloquent\Builder;
use Filament\Forms\Components\MarkdownEditor;
use App\Filament\Resources\PaketResource\Pages;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Resources\PaketResource\RelationManagers;

class PaketResource extends Resource
{
    protected static ?string $model = Paket::class;

    protected static ?string $navigationIcon = 'heroicon-o-squares-2x2';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Group::make()->schema([
                    Section::make('Informasi Paket')->schema([
                        TextInput::make('namapaket')
                            ->required()
                            ->maxLength(255)
                            ->label('Nama Paket')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn (string $operation, $state, Set $set) => $operation ==='create'? $set('slug',Str::slug($state)): null ),

                        TextInput::make('slug')
                            ->required()
                            ->disabled()
                            ->dehydrated()
                            ->unique(Paket::class, 'slug', ignoreRecord:true),
                        MarkdownEditor::make('ket')   
                            ->required()
                            ->label('Deskripsi')
                            ->fileAttachmentsDirectory('paket')
                            ->columnSpanFull(), 
                    ])->columns(2),
                    Section::make('Upload Foto/Images')->schema([
                        FileUpload::make('image')
                            ->multiple()
                            ->directory('paket')
                            ->maxFiles(5)
                            ->reorderable()
                        ])
                            
                ])->columnSpan(2), 
                Group::make()->schema([
                    Section::make('Kategori Paket')->schema([
                        Select::make('jenispaket_id')
                            ->label('Jenis Paket')
                            ->relationship('jenispaket', 'namajenis')
                            ->searchable()
                            ->preload()
                            ->multiple()
                            ->required(),
                        Select::make('programhari_id')
                            ->label('Program Hari')
                            ->relationship('programhari', 'namaprogram')
                            ->searchable()
                            ->preload()
                            ->required(),

                    ])->columnSpan(1),
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListPakets::route('/'),
            'create' => Pages\CreatePaket::route('/create'),
            'edit' => Pages\EditPaket::route('/{record}/edit'),
        ];
    }
}
