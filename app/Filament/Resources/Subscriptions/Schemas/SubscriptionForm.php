<?php

namespace App\Filament\Resources\Subscriptions\Schemas;

use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema; // Important for v4

class SubscriptionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([ // v4 mein ->components() use hota hai
                Section::make('Subscription Information')
                    ->description('Basic subscription details')
                    ->schema([
                        Select::make('user_id')
                            ->label('User')
                            ->relationship('user', 'name')
                            ->searchable()
                            ->preload()
                            ->required(),

                        Select::make('package_id')
                            ->label('Package')
                            ->relationship('package', 'name')
                            ->required()
                            ->live()
                            ->afterStateUpdated(function ($state, callable $set) {
                                if ($state) {
                                    $package = \App\Models\Package::find($state);
                                    if ($package) {
                                        $starts = now();
                                        $set('starts_at', $starts->format('Y-m-d H:i:s'));
                                        // Baki logic yahan add karein...
                                    }
                                }
                            }),

                        TextInput::make('subdomain')->required(),

                        Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'active' => 'Active',
                            ])->required(),
                    ])
                    ->columns(2),
            ]);
    }
}