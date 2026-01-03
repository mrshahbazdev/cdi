<?php

namespace App\Filament\Resources\Subscriptions;

use App\Filament\Resources\Subscriptions\Pages\CreateSubscription;
use App\Filament\Resources\Subscriptions\Pages\EditSubscription;
use App\Filament\Resources\Subscriptions\Pages\ListSubscriptions;
use App\Filament\Resources\Subscriptions\Pages\ViewSubscription;
use App\Filament\Resources\Subscriptions\Schemas\SubscriptionForm;
use App\Filament\Resources\Subscriptions\Schemas\SubscriptionInfolist;
use App\Filament\Resources\Subscriptions\Tables\SubscriptionsTable;
use App\Models\Subscription;
use BackedEnum;
use Filament\Forms\Form; // Corrected: Schema ki jagah Form
use Filament\Infolists\Infolist; // Corrected: Schema ki jagah Infolist
use Filament\Resources\Resource;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;

class SubscriptionResource extends Resource
{
    protected static ?string $model = Subscription::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $recordTitleAttribute = 'subdomain';

    protected static ?int $navigationSort = 3;

    protected static ?string $navigationLabel = 'Subscriptions';

    /**
     * Form Configuration
     */
    public static function form(Form $form): Form
    {
        // SubscriptionForm::configure mein ab Form pass ho raha hai
        return SubscriptionForm::configure($form);
    }

    /**
     * Infolist (Detail View) Configuration
     */
    public static function infolist(Infolist $infolist): Infolist
    {
        // SubscriptionInfolist::configure mein ab Infolist pass ho rahi hai
        return SubscriptionInfolist::configure($infolist);
    }

    /**
     * Table Configuration
     */
    public static function table(Table $table): Table
    {
        return SubscriptionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            // Yahan aap relation managers add kar sakte hain
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListSubscriptions::route('/'),
            'create' => CreateSubscription::route('/create'),
            'view' => ViewSubscription::route('/{record}'),
            'edit' => EditSubscription::route('/{record}/edit'),
        ];
    }

    /**
     * Navigation Badge (Pending Count)
     */
    public static function getNavigationBadge(): ?string
    {
        $pendingCount = static::getModel()::where('status', 'pending')->count();
        return $pendingCount > 0 ? (string) $pendingCount : null;
    }

    public static function getNavigationBadgeColor(): ?string
    {
        return 'warning';
    }

    public static function getNavigationBadgeTooltip(): ?string
    {
        $pendingCount = static::getModel()::where('status', 'pending')->count();
        return $pendingCount > 0 
            ? "{$pendingCount} pending approval" 
            : null;
    }

    /**
     * Global Search Configuration
     */
    public static function getGlobalSearchResultTitle($record): string
    {
        return $record->subdomain;
    }

    public static function getGlobalSearchResultDetails($record): array
    {
        return [
            'User' => $record->user?->name ?? 'N/A',
            'Status' => ucfirst($record->status),
        ];
    }

    public static function getGlobalSearchResultUrl($record): string
    {
        return static::getUrl('view', ['record' => $record]);
    }
}