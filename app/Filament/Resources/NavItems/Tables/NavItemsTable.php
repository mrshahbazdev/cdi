<?php

namespace App\Filament\Resources\NavItems\Tables;

use Filament\Tables\Table;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Grouping\Group;
use Filament\Actions\EditAction;
use Filament\Actions\DeleteAction;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;

class NavItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table

            /* ================= GROUPING (COLLAPSIBLE) ================= */
            ->groups([
                Group::make('parent.title')
                    ->label('Menu Group')
                    ->collapsible(), // ✅ Filament v4 supported
            ])

            /* ================= ORDERING ================= */
            ->reorderable('sort_order')
            ->defaultSort('sort_order')

            /* ================= COLUMNS ================= */
            ->columns([

                TextColumn::make('title')
                    ->label('Menu Title')
                    ->searchable()
                    ->sortable(),

                BadgeColumn::make('children_count')
                    ->label('Children')
                    ->counts('children')
                    ->colors(['primary']),

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
                    ->label('Visible')
                    ->query(fn ($q) => $q->where('is_visible', true)),

                Filter::make('hidden')
                    ->label('Hidden')
                    ->query(fn ($q) => $q->where('is_visible', false)),

                Filter::make('root')
                    ->label('Parent items only')
                    ->query(fn ($q) => $q->whereNull('parent_id')),
            ])

            /* ================= ROW ACTIONS ================= */
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            /* ================= BULK ACTIONS ================= */
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
