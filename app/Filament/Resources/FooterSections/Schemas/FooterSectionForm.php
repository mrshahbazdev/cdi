<?php

namespace App\Filament\Resources\FooterSections\Schemas;

use Filament\Schemas\Schema;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Select;

class FooterSectionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('title')
                    ->label('Section Title')
                    ->placeholder('e.g. Platform, Legal, Company')
                    ->maxLength(255)
                    ->columnSpanFull(),

                Toggle::make('is_visible')
                    ->label('Visible')
                    ->default(true),

                Repeater::make('items')
                    ->label('Footer Items')
                    ->relationship() // footer_items table
                    ->orderable('sort_order') // drag & drop
                    ->reorderable()
                    ->addActionLabel('Add Footer Item')
                    ->schema([
                        TextInput::make('label')
                            ->label('Label')
                            ->required()
                            ->maxLength(255),

                        TextInput::make('url')
                            ->label('URL')
                            ->placeholder('https://example.com'),

                        Select::make('icon')
                            ->label('Icon')
                            ->options([
                                'heroicon-o-link' => 'Link',
                                'heroicon-o-document-text' => 'Document',
                                'heroicon-o-envelope' => 'Email',
                                'heroicon-o-globe-alt' => 'Website',
                            ])
                            ->searchable()
                            ->nullable(),

                        Toggle::make('is_visible')
                            ->label('Visible')
                            ->default(true),
                    ])
                    ->columns(2)
                    ->collapsible()
                    ->collapsed(false),
            ]);
    }
}
