<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form; // Schema ki jagah Form use karna zaroori hai
use Illuminate\Support\Facades\Log;

class SubscriptionForm
{
    public static function configure(Form $form): Form
    {
        return $form
            ->schema([
                Section::make('Subscription Information')
                    ->description('Basic subscription details')
                    ->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->columnSpan(1),

                        Select::make('package_id')
                            ->label('Package')
                            ->relationship('package', 'name')
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live() // reactive() ki jagah live() use hota hai v3 mein
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $package = \App\Models\Package::find($state);
                                    if ($package) {
                                        // Auto-calculate expiry date
                                        $starts = now();
                                        $expires = null;
                                        
                                        if ($package->duration_type !== 'lifetime') {
                                            $expires = match($package->duration_type) {
                                                'trial', 'days' => $starts->copy()->addDays($package->duration_value),
                                                'months' => $starts->copy()->addMonths($package->duration_value),
                                                'years' => $starts->copy()->addYears($package->duration_value),
                                                default => $starts->copy()->addDays(30),
                                            };
                                        }
                                        
                                        $set('starts_at', $starts->format('Y-m-d H:i:s'));
                                        $set('expires_at', $expires ? $expires->format('Y-m-d H:i:s') : null);
                                    }
                                }
                            })
                            ->columnSpan(1),

                        TextInput::make('subdomain')
                            ->label('Subdomain')
                            ->required()
                            ->unique(ignoreRecord: true)
                            ->regex('/^[a-z0-9]([a-z0-9-]{0,61}[a-z0-9])?$/')
                            ->helperText('Only lowercase letters, numbers, and hyphens (3-63 characters)')
                            ->minLength(3)
                            ->maxLength(63)
                            ->columnSpan(1),

                        Select::make('status')
                            ->label('Status')
                            ->options([
                                'pending' => 'Pending',
                                'active' => 'Active',
                                'expired' => 'Expired',
                                'cancelled' => 'Cancelled',
                            ])
                            ->default('pending')
                            ->required()
                            ->columnSpan(1),
                    ])
                    ->columns(2),

                Section::make('Transaction Information')
                    ->description('Payment and transaction details')
                    ->schema([
                        Select::make('transaction_id')
                            ->label('Transaction')
                            ->relationship('transaction', 'transaction_id')
                            ->searchable()
                            ->preload()
                            ->nullable()
                            ->columnSpan(1),
                    ])
                    ->columns(1)
                    ->collapsible(),

                Section::make('Duration')
                    ->description('Subscription start and end dates')
                    ->schema([
                        DateTimePicker::make('starts_at')
                            ->label('Start Date')
                            ->required()
                            ->default(now())
                            ->columnSpan(1),

                        DateTimePicker::make('expires_at')
                            ->label('Expiry Date')
                            ->nullable()
                            ->helperText('Leave empty for lifetime subscriptions')
                            ->columnSpan(1),
                    ])
                    ->columns(2),
            ]);
    }
}