<?php

namespace App\Filament\Resources\Menus\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\Menu;

class MenuForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->trim()
                    ->required()
                    ->translatableTabs()
                    ->columnSpanFull(),
                TextInput::make('url')
                    ->trim()
                    ->placeholder('Ссылку'),
                Select::make('position')
                    ->options([
                        'header' => 'Header',
                        'footer' => 'Footer',
                    ])
                    ->default('header')
                    ->label('Позиция'),
                Select::make('target')
                    ->options([
                        '_blank' => 'Blank',
                        '_self' => 'Self',
                    ])
                    ->default('_self')
                    ->label('Открытие ссылки'),
                TextInput::make('sort')
                    ->trim()
                    ->numeric()
                    ->default(fn() => Menu::count() + 1)
                    ->label('Порядок'),
                Toggle::make('status')
                    ->label('Статус')
                    ->default(true),
            ]);
    }
}
