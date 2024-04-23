<?php

namespace App\Filament\Forms;

use Filament\Forms\Components\TextInput;

class DisciplineForm
{
    public static function form(): array
    {
        return [
            TextInput::make('name')
                ->label('Nome')
                ->unique()
                ->required()
                ->maxLength(255),
        ];
    }
}
