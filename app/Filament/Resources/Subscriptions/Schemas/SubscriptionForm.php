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

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema->components([

            /* =====================
             | Subscription Details
             ===================== */
            Section::make('Subscription Information')
                ->schema([

                    Grid::make(2)->schema([

                        Select::make('user_id')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('package_id')
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

                                    $package = Package::with('tool')->find($state);

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
                            ->label('Domain')
                            ->required()
                            ->unique(Subscription::class, 'subdomain', ignoreRecord: true)
                            ->regex('/^[a-z0-9]([a-z0-9-]{0,61}[a-z0-9])?$/')
                            ->minLength(3)
                            ->maxLength(63)
                            ->helperText('Used as subdomain (shown in table as full domain)'),

                        Select::make('status')
                            ->options([
                                'pending'   => 'Pending',
                                'active'    => 'Active',
                                'expired'   => 'Expired',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending')
                            ->required()
                            ->helperText('Status actions are handled from table'),
                    ]),
                ]),

            /* =====================
             | Transaction
             ===================== */
            Section::make('Transaction')
                ->schema([

                    Select::make('transaction_id')
                        ->relationship('transaction', 'transaction_id')
                        ->searchable()
                        ->preload()
                        ->nullable(),
                ])
                ->collapsible(),

            /* =====================
             | Duration
             ===================== */
            Section::make('Subscription Duration')
                ->schema([

                    Grid::make(2)->schema([

                        DateTimePicker::make('starts_at')
                            ->label('Start Date')
                            ->native(false)
                            ->required()
                            ->default(now()),

                        DateTimePicker::make('expires_at')
                            ->label('Expiry Date')
                            ->native(false)
                            ->nullable()
                            ->helperText('Empty = Lifetime'),
                    ]),
                ]),
        ]);
    }
}
