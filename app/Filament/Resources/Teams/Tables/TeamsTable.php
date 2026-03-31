<?php

namespace App\Filament\Resources\Teams\Tables;

use Faker\Provider\Image;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;

use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;

class TeamsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('img')
                    ->label('Фото')
                    ->imageHeight('100px'),
                TextColumn::make('name')
                    ->label('Ф.И.О.')
                    ->searchable(),
                TextColumn::make('col_type')
                    ->label('Тип')
                    ->badge(),
                TextColumn::make('sort')
                    ->label('Позиция'),
                ToggleColumn::make('status')
                    ->label('Активен'),
                TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->recordActions([
                EditAction::make()
                ->button(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
