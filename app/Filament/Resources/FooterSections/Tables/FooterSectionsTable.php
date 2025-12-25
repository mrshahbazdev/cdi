<?php

namespace App\Filament\Resources\FooterSections\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class FooterSectionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->reorderable('sort_order') // 🔥 Drag & Drop sections
            ->defaultSort('sort_order')
            ->columns([
                TextColumn::make('title')
                    ->label('Section Title')
                    ->searchable()
                    ->sortable()
                    ->placeholder('— No title —'),

                BadgeColumn::make('items_count')
                    ->label('Items')
                    ->counts('items')
                    ->colors([
                        'primary',
                    ]),

                ToggleColumn::make('is_visible')
                    ->label('Visible')
                    ->sortable(),

                TextColumn::make('updated_at')
                    ->label('Last Updated')
                    ->dateTime('d M Y, H:i')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('visible')
                    ->label('Visible only')
                    ->query(fn ($query) => $query->where('is_visible', true)),

                Filter::make('hidden')
                    ->label('Hidden only')
                    ->query(fn ($query) => $query->where('is_visible', false)),
            ])
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil'),
                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash'),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
