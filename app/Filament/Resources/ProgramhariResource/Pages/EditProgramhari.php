<?php

namespace App\Filament\Resources\ProgramhariResource\Pages;

use App\Filament\Resources\ProgramhariResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditProgramhari extends EditRecord
{
    protected static string $resource = ProgramhariResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
