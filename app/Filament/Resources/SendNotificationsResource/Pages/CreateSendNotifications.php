<?php

namespace App\Filament\Resources\SendNotificationsResource\Pages;

use App\Filament\Resources\SendNotificationsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Filament\Notifications\Events\DatabaseNotificationsSent;
use Filament\Notifications\Notification;
use Illuminate\Support\Facades\Auth;

class CreateSendNotifications extends CreateRecord
{
    protected static string $resource = SendNotificationsResource::class;


    protected function beforeSave(): void
    {
        $recipient = Auth::user();
 
        Notification::make()
            ->title('Saved successfully')
            ->sendToDatabase($recipient);
    }
}
