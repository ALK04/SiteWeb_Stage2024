<?php

namespace App\Filament\Resources\InfoPdfResource\Pages;

use App\Filament\Resources\InfoPdfResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditInfoPdf extends EditRecord
{
    protected static string $resource = InfoPdfResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
