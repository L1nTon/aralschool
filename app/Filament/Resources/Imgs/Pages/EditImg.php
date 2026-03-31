<?php

namespace App\Filament\Resources\Imgs\Pages;

use App\Filament\Resources\Imgs\ImgResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditImg extends EditRecord
{
    protected static string $resource = ImgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
