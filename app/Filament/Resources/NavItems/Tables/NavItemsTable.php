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
            ->defaultSort('parent_id')   // Parent first
            ->defaultSort('sort_order')  // Then order inside parent
            ->reorderable('sort_order')

            /* ================= COLUMNS ================= */
            ->columns([

                TextColumn::make('title')
                    ->label('Menu Title')
                    ->searchable()
                    ->sortable()
                    // 👇 INDENT CHILD ITEMS
                    ->formatStateUsing(function ($state, $record) {
                        return $record->parent_id
                            ? '↳ ' . $state
                            : $state;
                    })
                    ->extraAttributes(fn ($record) => [
                        'class' => $record->parent_id
                            ? 'pl-6 text-gray-600'
                            : 'font-bold text-gray-900',
                    ]),

                TextColumn::make('parent.title')
                    ->label('Parent')
                    ->placeholder('— Root —')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),

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
                Filter::make('root')
                    ->label('Root items only')
                    ->query(fn ($query) => $query->whereNull('parent_id')),

                Filter::make('children')
                    ->label('Child items only')
                    ->query(fn ($query) => $query->whereNotNull('parent_id')),

                Filter::make('visible')
                    ->label('Visible')
                    ->query(fn ($query) => $query->where('is_visible', true)),
            ])

            /* ================= ROW ACTIONS ================= */
            ->recordActions([
                EditAction::make()
                    ->icon('heroicon-o-pencil'),

                DeleteAction::make()
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
