<?php

namespace App\Filament\Resources\Teams\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

use App\Models\Team;

class TeamForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->columns(4)
            ->components([
                FileUpload::make('img')
                    ->disk('public')
                    ->directory('team')
                    ->image()
                    ->imageEditor()
                    ->preserveFilenames()
                    ->required(),
                TextInput::make('sort')
                    ->trim()
                    ->numeric()
                    ->default(fn()=> Team::count()+1),
                TextInput::make('category')
                    ->trim(),
                Select::make('col_type')
                    ->options(['chair' => 'Chair', 'pair' => 'Pair', 'single' => 'Single'])
                    ->default('single'),
                TextInput::make('name')
                    ->trim()
                    ->label('Ф.И.О.')
                    ->required()
                    ->translatableTabs()
                    ->columnSpanFull(),
                TextInput::make('who')
                    ->trim()
                    ->label('Должность')
                    ->translatableTabs()
                    ->columnSpanFull(),
                Textarea::make('member_info')
                    ->trim()
                    ->label('Информация')
                    ->required()
                    ->translatableTabs()
                    ->columnSpanFull(),
                Toggle::make('status')
                    ->required()
                    ->default(true),
            ]);
    }
}
