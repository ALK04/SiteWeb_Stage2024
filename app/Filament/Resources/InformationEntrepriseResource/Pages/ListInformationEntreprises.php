<?php

namespace App\Filament\Resources\InformationEntrepriseResource\Pages;

use App\Filament\Resources\InformationEntrepriseResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInformationEntreprises extends ListRecords
{
    protected static string $resource = InformationEntrepriseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
