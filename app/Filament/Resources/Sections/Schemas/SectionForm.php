<?php

namespace App\Filament\Resources\Sections\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\Section;

class SectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('section_id')
                    ->required(),
                TextInput::make('category')
                    ->default(null)
                    ->default('home'),
                TextInput::make('sort')
                    ->required()
                    ->numeric()
                    ->default(fn() => Section::count()+1),
                Toggle::make('status')
                    ->default(true),
            ]);
    }
}
