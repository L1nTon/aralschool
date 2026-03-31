<?php

namespace App\Filament\Resources\Imgs\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\FileUpload;
use Filament\Schemas\Schema;

class ImgForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                FileUpload::make('src')
                    ->disk('public')
                    ->directory('team')
                    ->image()
                    ->imageEditor()
                    ->preserveFilenames()
                    ->required()
                    ->columnSpanFull(),
                TextInput::make('key')
                    ->required(),
                TextInput::make('alt')
                    ->default(null),
                Toggle::make('status')
                    ->default(true)
                    ->required(),
            ]);
    }
}
