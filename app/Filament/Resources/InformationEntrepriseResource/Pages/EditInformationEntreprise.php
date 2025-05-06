<?php

namespace App\Filament\Resources\InformationEntrepriseResource\Pages;

use App\Filament\Resources\InformationEntrepriseResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInformationEntreprise extends EditRecord
{
    protected static string $resource = InformationEntrepriseResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
