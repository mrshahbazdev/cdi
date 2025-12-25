<?php

namespace App\Filament\Resources\NavItems\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class NavItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            /* ================= ORDERING ================= */
            ->reorderable('sort_order')
            ->defaultSort('sort_order')

            /* ================= COLUMNS ================= */
            ->columns([

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable(),

                TextColumn::make('parent.title')
                    ->label('Parent')
                    ->placeholder('— Root —')
                    ->sortable(),

                BadgeColumn::make('children_count')
                    ->label('Children')
                    ->counts('children')
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

            /* ================= FILTERS ================= */
            ->filters([
                Filter::make('visible')
                    ->label('Visible only')
                    ->query(fn ($query) => $query->where('is_visible', true)),

                Filter::make('hidden')
                    ->label('Hidden only')
                    ->query(fn ($query) => $query->where('is_visible', false)),

                Filter::make('root')
                    ->label('Root items')
                    ->query(fn ($query) => $query->whereNull('parent_id')),

                Filter::make('children')
                    ->label('Child items')
                    ->query(fn ($query) => $query->whereNotNull('parent_id')),
            ])

            /* ================= ROW ACTIONS ================= */
            ->recordActions([
                EditAction::make()
                    ->label('Edit')
                    ->icon('heroicon-o-pencil'),

                DeleteAction::make()
                    ->label('Delete')
                    ->icon('heroicon-o-trash'),
            ])

            /* ================= BULK ACTIONS ================= */
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
