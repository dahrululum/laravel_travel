<?php

namespace App\Filament\Resources\ProgramhariResource\Pages;

use App\Filament\Resources\ProgramhariResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListProgramharis extends ListRecords
{
    protected static string $resource = ProgramhariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
