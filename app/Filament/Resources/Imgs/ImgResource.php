<?php

namespace App\Filament\Resources\Imgs;

use App\Filament\Resources\Imgs\Pages\CreateImg;
use App\Filament\Resources\Imgs\Pages\EditImg;
use App\Filament\Resources\Imgs\Pages\ListImgs;
use App\Filament\Resources\Imgs\Schemas\ImgForm;
use App\Filament\Resources\Imgs\Tables\ImgsTable;
use App\Models\Img;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class ImgResource extends Resource
{
    protected static ?string $model = Img::class;
    
    protected static ?string $navigationLabel = "Фотографии";
    protected static ?string $pluralModelLabel = "Фотографии";

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedPhoto;

    protected static ?string $recordTitleAttribute = 'Img';

    public static function form(Schema $schema): Schema
    {
        return ImgForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return ImgsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListImgs::route('/'),
            'create' => CreateImg::route('/create'),
            'edit' => EditImg::route('/{record}/edit'),
        ];
    }
}
