<?php

namespace App\Filament\Resources\FooterSections\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

class FooterSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /* ================= SECTION ================= */

            Select::make('type')
                ->label('Section Type')
                ->options([
                    'brand'   => 'Brand / Description',
                    'links'   => 'Links',
                    'socials' => 'Social Icons',
                ])
                ->required()
                ->live()
                ->columnSpanFull(),

            TextInput::make('title')
                ->label('Section Title')
                ->visible(fn ($get) => in_array($get('type'), ['links', 'socials']))
                ->columnSpanFull(),

            Toggle::make('is_visible')
                ->default(true),

            /* ================= ITEMS ================= */

            Repeater::make('items')
                ->relationship()
                ->orderable('sort_order')
                ->reorderable()
                ->schema([

                    /* LABEL (USED EVERYWHERE) */
                    TextInput::make('label')
                        ->label(fn ($get) =>
                            $get('../../type') === 'brand'
                                ? 'Text / Description'
                                : 'Label'
                        )
                        ->required(fn ($get) =>
                            in_array($get('../../type'), ['links', 'socials'])
                        )
                        ->dehydrated() // 🔥 VERY IMPORTANT
                        ->columnSpanFull(),

                    /* URL (LINKS + SOCIALS ONLY) */
                    TextInput::make('url')
                        ->label('URL')
                        ->visible(fn ($get) =>
                            in_array($get('../../type'), ['links', 'socials'])
                        ),

                    /* SVG ICON (SOCIALS ONLY) */
                    Textarea::make('icon')
                        ->label('SVG Icon')
                        ->rows(3)
                        ->visible(fn ($get) =>
                            $get('../../type') === 'socials'
                        )
                        ->dehydrated(fn ($get) =>
                            $get('../../type') === 'socials'
                        ),

                    Toggle::make('is_visible')
                        ->default(true),
                ])
                ->columns(2)
                ->columnSpanFull(),
        ]);
    }
}
