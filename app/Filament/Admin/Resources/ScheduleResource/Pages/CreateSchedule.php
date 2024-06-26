<?php

namespace App\Filament\Admin\Resources\ScheduleResource\Pages;

use App\Filament\Admin\Resources\ScheduleResource;
use Filament\Resources\Pages\CreateRecord;

class CreateSchedule extends CreateRecord
{
    protected static string $resource = ScheduleResource::class;

    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
