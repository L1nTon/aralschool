<?php

namespace App\Filament\Resources\Imgs\Pages;

use App\Filament\Resources\Imgs\ImgResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListImgs extends ListRecords
{
    protected static string $resource = ImgResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
