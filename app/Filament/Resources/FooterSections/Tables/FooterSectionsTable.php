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
            /* ================= ORDERING ================= */
            ->reorderable('sort_order')
            ->defaultSort('sort_order')

            /* ================= COLUMNS ================= */
            ->columns([

                TextColumn::make('title')
                    ->label('Title')
                    ->searchable()
                    ->sortable()
                    ->placeholder('— No title —'),

                BadgeColumn::make('type')
                    ->label('Type')
                    ->colors([
                        'primary' => 'brand',
                        'success' => 'links',
                        'warning' => 'socials',
                        'info'    => 'bottom',
                    ])
                    ->formatStateUsing(fn (string $state) => ucfirst($state)),

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

            /* ================= FILTERS ================= */
            ->filters([
                Filter::make('visible')
                    ->label('Visible only')
                    ->query(fn ($query) => $query->where('is_visible', true)),

                Filter::make('hidden')
                    ->label('Hidden only')
                    ->query(fn ($query) => $query->where('is_visible', false)),

                Filter::make('type_brand')
                    ->label('Brand')
                    ->query(fn ($query) => $query->where('type', 'brand')),

                Filter::make('type_links')
                    ->label('Links')
                    ->query(fn ($query) => $query->where('type', 'links')),

                Filter::make('type_socials')
                    ->label('Socials')
                    ->query(fn ($query) => $query->where('type', 'socials')),

                Filter::make('type_bottom')
                    ->label('Bottom Bar')
                    ->query(fn ($query) => $query->where('type', 'bottom')),
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
