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

            /* ================= HIERARCHICAL ORDER FIX ================= */
            ->modifyQueryUsing(function ($query) {
                $query->orderByRaw('parent_id IS NOT NULL') // parents first
                      ->orderBy('parent_id')
                      ->orderBy('sort_order');
            })

            /* ================= DRAG & DROP ================= */
            ->reorderable('sort_order')

            /* ================= COLUMNS ================= */
            ->columns([

                TextColumn::make('title')
                    ->label('Menu Title')
                    ->formatStateUsing(fn ($state, $record) =>
                        $record->parent_id ? '↳ ' . $state : $state
                    )
                    ->extraAttributes(fn ($record) => [
                        'class' => $record->parent_id
                            ? 'pl-6 text-gray-600'
                            : 'font-bold text-gray-900',
                    ])
                    ->searchable(),

                TextColumn::make('parent.title')
                    ->label('Parent')
                    ->placeholder('— Root —')
                    ->toggleable(isToggledHiddenByDefault: true),

                BadgeColumn::make('children_count')
                    ->label('Children')
                    ->counts('children')
                    ->colors(['primary']),

                ToggleColumn::make('is_visible')
                    ->label('Visible'),

                TextColumn::make('updated_at')
                    ->label('Updated')
                    ->dateTime('d M Y')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])

            /* ================= FILTERS ================= */
            ->filters([
                Filter::make('root')
                    ->label('Parents only')
                    ->query(fn ($q) => $q->whereNull('parent_id')),

                Filter::make('children')
                    ->label('Children only')
                    ->query(fn ($q) => $q->whereNotNull('parent_id')),
            ])

            /* ================= ACTIONS ================= */
            ->recordActions([
                EditAction::make(),
                DeleteAction::make(),
            ])

            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
