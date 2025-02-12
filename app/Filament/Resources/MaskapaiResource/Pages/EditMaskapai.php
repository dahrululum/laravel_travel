<?php

namespace App\Filament\Resources\MaskapaiResource\Pages;

use App\Filament\Resources\MaskapaiResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditMaskapai extends EditRecord
{
    protected static string $resource = MaskapaiResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
