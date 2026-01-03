<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use App\Models\Package;
use App\Models\Subscription;
use Filament\Schemas\Schema;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Grid;
use Filament\Schemas\Components\Utilities\Set;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Toggle;

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /* =====================
             | Subscription Info
             ===================== */
            Section::make('Subscription Information')
                ->description('Basic subscription details')
                ->schema([

                    Grid::make(2)->schema([

                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('package_id')
                            ->label('Package')
                            ->relationship('package', 'name')
                            ->searchable()
                            ->preload()
                            ->live()
                            ->required()
                            ->afterStateUpdated(
                                function ($state, Set $set) {
                                    if (! $state) {
                                        return;
                                    }

                                    $package = Package::find($state);

                                    if (! $package) {
                                        return;
                                    }

                                    $startsAt = now();
                                    $expiresAt = null;

                                    if ($package->duration_type !== 'lifetime') {
                                        $expiresAt = match ($package->duration_type) {
                                            'trial', 'days' => $startsAt->copy()->addDays($package->duration_value),
                                            'months'        => $startsAt->copy()->addMonths($package->duration_value),
                                            'years'         => $startsAt->copy()->addYears($package->duration_value),
                                            default         => $startsAt->copy()->addDays(30),
                                        };
                                    }

                                    $set('starts_at', $startsAt);
                                    $set('expires_at', $expiresAt);
                                }
                            ),
                    ]),

                    Grid::make(2)->schema([

                        TextInput::make('subdomain')
                            ->label('Subdomain')
                            ->required()
                            ->unique(Subscription::class, 'subdomain', ignoreRecord: true)
                            ->regex('/^[a-z0-9]([a-z0-9-]{0,61}[a-z0-9])?$/')
                            ->minLength(3)
                            ->maxLength(63)
                            ->helperText('Lowercase letters, numbers & hyphens only'),

                        Select::make('status')
                            ->options([
                                'pending'   => 'Pending',
                                'active'    => 'Active',
                                'expired'   => 'Expired',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending')
                            ->required(),
                    ]),
                ]),

            /* =====================
             | Transaction
             ===================== */
            Section::make('Transaction Information')
                ->schema([
                    Select::make('transaction_id')
                        ->label('Transaction')
                        ->relationship('transaction', 'transaction_id')
                        ->searchable()
                        ->preload()
                        ->nullable(),
                ])
                ->collapsible(),

            /* =====================
             | Duration
             ===================== */
            Section::make('Duration')
                ->description('Subscription start and expiry dates')
                ->schema([

                    Grid::make(2)->schema([

                        DateTimePicker::make('starts_at')
                            ->label('Start Date')
                            ->required()
                            ->native(false)
                            ->default(now()),

                        DateTimePicker::make('expires_at')
                            ->label('Expiry Date')
                            ->native(false)
                            ->nullable()
                            ->helperText('Leave empty for lifetime subscriptions'),
                    ]),
                ]),
        ]);
    }
}
