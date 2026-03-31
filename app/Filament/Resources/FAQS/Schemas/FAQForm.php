<?php

namespace App\Filament\Resources\FAQS\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;
use App\Models\FAQ;

class FAQForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema  
            ->columns(4)
            ->components([
                Textarea::make('question')
                    ->trim()
                    ->label('Вопрос')
                    ->required()
                    ->translatableTabs()
                    ->columnSpanFull(),
                Textarea::make('answer')
                    ->trim()
                    ->label('Ответ')
                    ->required()
                    ->translatableTabs()
                    ->columnSpanFull(),
                Select::make('position')
                    ->label('Позиция в списке')
                    ->options(['r' => 'Справа', 'l' => 'Слева'])
                    ->default('l'),
                TextInput::make('sort')
                    ->trim()
                    ->label('Позиция в списке')
                    ->numeric()
                    ->default(fn()=> FAQ::count()+1),
            ]);
    }
}
