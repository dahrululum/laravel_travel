<?php

namespace App\Filament\Resources\JenispaketResource\Pages;

use App\Filament\Resources\JenispaketResource;
use Filament\Pages\Actions;
use Filament\Resources\Pages\ListRecords;

class ListJenispakets extends ListRecords
{
    protected static string $resource = JenispaketResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
