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

            /* ================= SECTION SETTINGS ================= */

            Select::make('type')
                ->label('Section Type')
                ->options([
                    'brand'   => 'Brand / Description',
                    'links'   => 'Links',
                    'socials' => 'Social Icons',
                    'bottom'  => 'Bottom Bar Links',
                ])
                ->required()
                ->live()
                ->columnSpanFull(),

            TextInput::make('title')
                ->label('Section Title')
                ->placeholder('e.g. Platform, Legal, Resources')
                ->visible(fn ($get) =>
                    in_array($get('type'), ['links', 'socials'])
                )
                ->columnSpanFull(),

            Toggle::make('is_visible')
                ->label('Visible')
                ->default(true),

            /* ================= SECTION ITEMS ================= */

            Repeater::make('items')
                ->relationship()
                ->orderable('sort_order')
                ->reorderable()
                ->addActionLabel('Add Item')
                ->columnSpanFull()
                ->schema([

                    /* LABEL / TEXT */
                    TextInput::make('label')
                        ->label(fn ($get) =>
                            $get('../../type') === 'brand'
                                ? 'Text / Description'
                                : 'Label'
                        )
                        ->required(fn ($get) =>
                            in_array($get('../../type'), ['links', 'socials', 'bottom'])
                        )
                        ->dehydrated()
                        ->columnSpanFull(),

                    /* URL (LINKS / SOCIALS / BOTTOM) */
                    TextInput::make('url')
                        ->label('URL')
                        ->placeholder('https://example.com or /status')
                        ->visible(fn ($get) =>
                            in_array($get('../../type'), ['links', 'socials', 'bottom'])
                        )
                        ->dehydrated(fn ($get) =>
                            in_array($get('../../type'), ['links', 'socials', 'bottom'])
                        ),

                    /* SVG ICON (SOCIALS ONLY) */
                    Textarea::make('icon')
                        ->label('SVG Icon')
                        ->rows(3)
                        ->helperText('Paste SVG code here (only for social icons)')
                        ->visible(fn ($get) =>
                            $get('../../type') === 'socials'
                        )
                        ->dehydrated(fn ($get) =>
                            $get('../../type') === 'socials'
                        ),

                    Toggle::make('is_visible')
                        ->label('Visible')
                        ->default(true),
                ])
                ->columns(2),
        ]);
    }
}
