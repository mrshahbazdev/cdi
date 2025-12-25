<?php

namespace App\Filament\Resources\NavItems\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Toggle;
use App\Models\NavItem;

class NavItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /* ================= BASIC INFO ================= */

            TextInput::make('title')
                ->label('Menu Title')
                ->required()
                ->maxLength(255)
                ->columnSpanFull(),

            TextInput::make('url')
                ->label('URL')
                ->placeholder('/dashboard or https://example.com')
                ->helperText('Leave empty or use # if this item only opens a dropdown')
                ->columnSpanFull(),

            /* ================= HIERARCHY ================= */

            Select::make('parent_id')
                ->label('Parent Menu Item')
                ->options(
                    NavItem::pluck('title', 'id')
                )
                ->searchable()
                ->nullable()
                ->helperText('Select a parent to create a dropdown / submenu')
                ->columnSpanFull(),

            /* ================= VISIBILITY ================= */

            Toggle::make('is_visible')
                ->label('Visible')
                ->default(true),

        ]);
    }
}
