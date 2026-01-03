<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Infolists\Infolist;
use Filament\Infolists\Components\TextEntry;
use Filament\Infolists\Components\Section;
use Filament\Infolists\Components\Grid;

class SubscriptionInfolist
{
    public static function configure(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Section::make('Subscription Information')
                    ->schema([
                        TextEntry::make('user.name')
                            ->label('User'),
                        TextEntry::make('package.name')
                            ->label('Package'),
                        TextEntry::make('subdomain')
                            ->label('Subdomain'),
                        TextEntry::make('status')
                            ->badge()
                            ->color(fn (string $state): string => match ($state) {
                                'active' => 'success',
                                'pending' => 'warning',
                                'expired' => 'danger',
                                'cancelled' => 'gray',
                                default => 'gray',
                            }),
                    ])
                    ->columns(2),
                    
                Section::make('Duration')
                    ->schema([
                        TextEntry::make('starts_at')
                            ->label('Start Date')
                            ->dateTime(),
                        TextEntry::make('expires_at')
                            ->label('Expiry Date')
                            ->dateTime()
                            ->placeholder('Lifetime'),
                    ])
                    ->columns(2),
            ]);
    }
}