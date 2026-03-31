<?php

namespace App\Filament\Resources\SiteTranslations\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;


class SiteTranslationForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('key')
                    ->trim()
                    ->required(),
                TextInput::make('category')
                    ->trim()
                    ->default(null),
                Textarea::make('value')
                    ->trim()
                    ->required()
                    ->translatableTabs()
                    ->columnSpanFull(),
                Toggle::make('is_published')
                    ->label('Опубликован')
                    ->required()
                    ->default(true),
            ]);
    }
}
