<?php

namespace App\Filament\Pages\Logs;

use FilipFonal\FilamentLogManager\Pages\Logs;

class CustomLogs extends Logs
{
    public static function getNavigationGroup(): ?string
    {
        return 'Configurações';
    }

    public static function canAccess(): bool
    {
        if (isset(auth()->user()->is_admin)) {
            return auth()->user()->is_admin;
        } else {
            return false;
        }
    }
}
