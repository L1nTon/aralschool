# Руководство: Создание мультиязычных моделей и админ-панели

Это руководство описывает пошаговый процесс создания мультиязычной модели (как Navbar) и её управления через Filament админ-панель.

---

## Шаг 1: Создать модель

```bash
php artisan make:model YourModelName
```

**Пример:** `php artisan make:model Hero` создаст модель для героя лендинга

---

## Шаг 2: Создать миграцию

```bash
php artisan make:migration create_your_model_names_table
```

**Пример:** `php artisan make:migration create_heroes_table`

### В файле миграции `database/migrations/YYYY_MM_DD_HHMMSS_create_yourmodels_table.php`:

```php
public function up(): void
{
    Schema::create('heroes', function (Blueprint $table) {
        $table->id();
        $table->json('title')->nullable();           // Мультиязычное название
        $table->json('description')->nullable();     // Мультиязычное описание
        $table->string('image')->nullable();         // или другие поля
        $table->string('url')->nullable();           // Опциональная ссылка
        $table->timestamps();
    });
}

public function down(): void
{
    Schema::dropIfExists('heroes');
}
```

**Важно:** Используйте JSON колонки для мультиязычности вместо отдельных столбцов

---

## Шаг 3: Обновить модель

В файле `app/Models/YourModelName.php`:

```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hero extends Model
{
    protected $fillable = ['title', 'description', 'image', 'url'];
    
    protected $casts = [
        'title' => 'json',
        'description' => 'json',
    ];
    
    /**
     * Get translation for specific key and locale
     */
    public function getTranslation(string $key, string $locale): ?string
    {
        if (is_array($this->getAttribute($key))) {
            return $this->getAttribute($key)[$locale] ?? null;
        }
        return null;
    }
    
    /**
     * Get value in specific language
     */
    public function getInLocale(string $key, string $locale = null): ?string
    {
        $locale = $locale ?? app()->getLocale();
        $value = $this->getAttribute($key);
        
        if (is_array($value)) {
            return $value[$locale] ?? null;
        }
        return $value;
    }
}
```

---

## Шаг 4: Запустить миграцию

```bash
php artisan migrate
```

---

## Шаг 5: Создать Filament Resource

```bash
php artisan make:filament-resource Hero
```

Это создаст:
- `app/Filament/Resources/HeroResource.php`
- `app/Filament/Resources/Hero/Pages/CreateHero.php`
- `app/Filament/Resources/Hero/Pages/EditHero.php`
- `app/Filament/Resources/Hero/Pages/ListHeros.php`

---

## Шаг 6: Создать папку для форм и таблиц

```bash
mkdir -p app/Filament/Resources/Heroes/Schemas
mkdir -p app/Filament/Resources/Heroes/Tables
```

---

## Шаг 7: Создать форму (NavbarForm как пример)

Файл: `app/Filament/Resources/Heroes/Schemas/HeroForm.php`

```php
<?php

namespace App\Filament\Resources\Heroes\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Forms\Components\Grid;

class HeroForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Переводы контента')
                    ->description('Введите текст на разных языках')
                    ->schema([
                        Grid::make(2)
                            ->schema([
                                TextInput::make('title.ru')
                                    ->label('Заголовок (Русский)')
                                    ->required()
                                    ->placeholder('Например: Добро пожаловать'),
                                TextInput::make('title.en')
                                    ->label('Title (English)')
                                    ->required()
                                    ->placeholder('e.g. Welcome'),
                                TextInput::make('title.uz')
                                    ->label('Sarlavha (O\'zbekcha)')
                                    ->required(),
                                TextInput::make('title.kk')
                                    ->label('Атауы (Қазақша)')
                                    ->required(),
                            ]),
                        Grid::make(2)
                            ->schema([
                                Textarea::make('description.ru')
                                    ->label('Описание (Русский)')
                                    ->required()
                                    ->rows(4),
                                Textarea::make('description.en')
                                    ->label('Description (English)')
                                    ->required()
                                    ->rows(4),
                                Textarea::make('description.uz')
                                    ->label('Tavsifi (O\'zbekcha)')
                                    ->required()
                                    ->rows(4),
                                Textarea::make('description.kk')
                                    ->label('Сипаттамасы (Қазақша)')
                                    ->required()
                                    ->rows(4),
                            ]),
                    ]),
                Section::make('Медиа')
                    ->description('Добавьте изображение')
                    ->schema([
                        FileUpload::make('image')
                            ->label('Изображение')
                            ->image()
                            ->directory('heroes'),
                    ]),
                Section::make('Дополнительно')
                    ->schema([
                        TextInput::make('url')
                            ->label('URL')
                            ->placeholder('Опциональная ссылка'),
                    ]),
            ]);
    }
}
```

---

## Шаг 8: Создать таблицу

Файл: `app/Filament/Resources/Heroes/Tables/HerosTable.php`

```php
<?php

namespace App\Filament\Resources\Heroes\Tables;

use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Table;

class HerosTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('image')
                    ->label('Изображение'),
                TextColumn::make('title')
                    ->label('Заголовок')
                    ->formatStateUsing(function ($state) {
                        if (is_array($state)) {
                            return $state['ru'] ?? $state[array_key_first($state)] ?? 'N/A';
                        }
                        return $state;
                    })
                    ->searchable(),
                TextColumn::make('created_at')
                    ->label('Создано')
                    ->dateTime('d.m.Y H:i')
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ])
            ->defaultSort('created_at', 'desc');
    }
}
```

---

## Шаг 9: Обновить Resource

Файл: `app/Filament/Resources/HeroResource.php`

```php
<?php

namespace App\Filament\Resources;

use App\Filament\Resources\Heroes\Pages\CreateHero;
use App\Filament\Resources\Heroes\Pages\EditHero;
use App\Filament\Resources\Heroes\Pages\ListHeros;
use App\Filament\Resources\Heroes\Schemas\HeroForm;
use App\Filament\Resources\Heroes\Tables\HerosTable;
use App\Models\Hero;
use Filament\Resources\Resource;
use Filament\Forms\Form;
use Filament\Tables\Table;

class HeroResource extends Resource
{
    protected static ?string $model = Hero::class;
    
    protected static ?string $slug = 'heroes';
    
    protected static ?string $navigationIcon = 'heroicon-o-square-3-stack-3d';
    
    protected static ?string $navigationLabel = 'Герои';
    
    public static function getRecordTitle($record): ?string
    {
        if ($record && is_array($record->title)) {
            return $record->title['ru'] ?? $record->title[array_key_first($record->title)] ?? 'Hero';
        }
        return 'Hero';
    }

    public static function form(Form $form): Form
    {
        return HeroForm::configure($form);
    }

    public static function table(Table $table): Table
    {
        return HerosTable::configure($table);
    }

    public static function getPages(): array
    {
        return [
            'index' => ListHeros::route('/'),
            'create' => CreateHero::route('/create'),
            'edit' => EditHero::route('/{record}/edit'),
        ];
    }
}
```

---

## Шаг 10: Обновить Create-страницу

Файл: `app/Filament/Resources/Heroes/Pages/CreateHero.php`

```php
<?php

namespace App\Filament\Resources\Heroes\Pages;

use App\Filament\Resources\HeroResource;
use Filament\Resources\Pages\CreateRecord;

class CreateHero extends CreateRecord
{
    protected static string $resource = HeroResource::class;
}
```

---

## Шаг 11: Обновить Edit-страницу

Файл: `app/Filament/Resources/Heroes/Pages/EditHero.php`

```php
<?php

namespace App\Filament\Resources\Heroes\Pages;

use App\Filament\Resources\HeroResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditHero extends EditRecord
{
    protected static string $resource = HeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
```

---

## Шаг 12: Обновить List-страницу

Файл: `app/Filament/Resources/Heroes/Pages/ListHeros.php`

```php
<?php

namespace App\Filament\Resources\Heroes\Pages;

use App\Filament\Resources\HeroResource;
use Filament\Resources\Pages\ListRecords;

class ListHeros extends ListRecords
{
    protected static string $resource = HeroResource::class;

    protected function getHeaderActions(): array
    {
        return [
            // CreateAction добавляется автоматически
        ];
    }
}
```

---

## Шаг 13: Использование в представлениях (Blade)

```blade
<!-- Получить перевод для текущего языка -->
<h1>{{ $hero->getInLocale('title') }}</h1>
<p>{{ $hero->getInLocale('description') }}</p>

<!-- Получить перевод для конкретного языка -->
<h1>{{ $hero->getTranslation('title', 'ru') }}</h1>
<p>{{ $hero->getTranslation('description', 'en') }}</p>

<!-- Вывести все данные -->
@foreach($heroes as $hero)
    <div>
        <h2>{{ $hero->getInLocale('title') }}</h2>
        <p>{{ $hero->getInLocale('description') }}</p>
        @if($hero->image)
            <img src="{{ asset('storage/' . $hero->image) }}" alt="">
        @endif
    </div>
@endforeach
```

---

## Чек-лист для каждого раздела лендинга

Для каждой новой модели повторите эти шаги:

- [ ] Создать модель (`php artisan make:model`)
- [ ] Создать миграцию с JSON полями (`php artisan make:migration`)
- [ ] Обновить модель с методами `getTranslation()` и `getInLocale()`
- [ ] Запустить миграцию (`php artisan migrate`)
- [ ] Создать Filament Resource (`php artisan make:filament-resource`)
- [ ] Создать папки для Schemas и Tables
- [ ] Создать форму с dot-notation для JSON (`title.ru`, `title.en`, и т.д.)
- [ ] Создать таблицу для отображения
- [ ] Обновить Resource с `getRecordTitle()` методом
- [ ] Проверить, что страницы Create/Edit/List работают корректно

---

## Примеры секций лендинга

Вот какие модели могут потребоваться:

1. **Hero** — главный баннер
2. **About** — о школе
3. **Features** — особенности
4. **Courses** — курсы
5. **Team** — команда
6. **Testimonials** — отзывы
7. **News** — новости
8. **Contact** — контакты
9. **FAQ** — часто задаваемые вопросы

Для каждой повторяйте 13 шагов выше!

---

## Полезные команды

```bash
# Создать модель с миграцией
php artisan make:model Hero -m

# Создать Filament Resource с pages
php artisan make:filament-resource Hero

# Запустить все миграции
php artisan migrate

# Откатить последнюю миграцию
php artisan migrate:rollback

# Откатить конкретное количество миграций
php artisan migrate:rollback --step=2

# Обновить автозагрузку
composer dump-autoload
```

---

## Важные замечания

1. **JSON колонки** — используйте для мультиязычности вместо отдельных столбцов
2. **Dot-notation в Filament** — использует `title.ru`, `title.en` автоматически преобразует в JSON
3. **getRecordTitle()** — должен возвращать строку, а не массив
4. **getTranslation()** — метод модели для совместимости с Blade компонентами
5. **Языки** — `ru`, `en`, `uz`, `kk` (русский, английский, узбекский, казахский)
