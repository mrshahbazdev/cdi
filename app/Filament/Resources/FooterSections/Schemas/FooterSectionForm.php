<?php

namespace App\Filament\Resources\FooterSections\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;

class FooterSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([

                /* ================= SECTION SETTINGS ================= */

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
                    ->placeholder('e.g. Platform, Legal')
                    ->maxLength(255)
                    ->columnSpanFull()
                    ->visible(fn ($get) => in_array($get('type'), ['links', 'socials'])),

                Toggle::make('is_visible')
                    ->label('Visible')
                    ->default(true),

                /* ================= ITEMS ================= */

                Repeater::make('items')
                    ->label('Section Items')
                    ->relationship()
                    ->orderable('sort_order')
                    ->reorderable()
                    ->addActionLabel('Add Item')
                    ->collapsible()
                    ->collapsed(false)
                    ->schema([

                        /* BRAND TEXT */
                        Textarea::make('label')
                            ->label('Text / Description')
                            ->rows(4)
                            ->required()
                            ->visible(fn ($get) =>
                                $get('../../type') === 'brand'
                            ),

                        /* LINK LABEL */
                        TextInput::make('label')
                            ->label('Label')
                            ->required()
                            ->maxLength(255)
                            ->visible(fn ($get) =>
                                in_array($get('../../type'), ['links', 'socials'])
                            ),

                        /* URL */
                        TextInput::make('url')
                            ->label('URL')
                            ->placeholder('https://example.com')
                            ->visible(fn ($get) =>
                                in_array($get('../../type'), ['links', 'socials'])
                            ),

                        /* SOCIAL ICON (SVG / HTML) */
                        Textarea::make('icon')
                            ->label('Icon (SVG / HTML)')
                            ->rows(3)
                            ->helperText('Paste SVG or icon HTML (only for social links)')
                            ->visible(fn ($get) =>
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
