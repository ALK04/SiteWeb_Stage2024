<?php

namespace App\Filament\Resources\InfoPdfResource\Pages;

use App\Filament\Resources\InfoPdfResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListInfoPdfs extends ListRecords
{
    protected static string $resource = InfoPdfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
