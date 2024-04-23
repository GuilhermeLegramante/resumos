<?php

namespace App\Filament\Resources\ResumeResource\Pages;

use App\Filament\Resources\ResumeResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManageResumes extends ManageRecords
{
    protected static string $resource = ResumeResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
