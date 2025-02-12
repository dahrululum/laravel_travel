<?php

namespace App\Filament\Resources\JenispaketResource\Pages;

use App\Filament\Resources\JenispaketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\EditRecord;

class EditJenispaket extends EditRecord
{
    protected static string $resource = JenispaketResource::class;

    protected function getActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
