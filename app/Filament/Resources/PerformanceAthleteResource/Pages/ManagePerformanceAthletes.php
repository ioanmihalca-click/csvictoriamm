<?php

namespace App\Filament\Resources\PerformanceAthleteResource\Pages;

use App\Filament\Resources\PerformanceAthleteResource;
use Filament\Actions;
use Filament\Resources\Pages\ManageRecords;

class ManagePerformanceAthletes extends ManageRecords
{
    protected static string $resource = PerformanceAthleteResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
