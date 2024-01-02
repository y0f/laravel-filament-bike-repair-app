<?php

namespace App\Filament\Mechanic\Resources\ScheduleResource\Pages;

use App\Models\Schedule;
use App\Enums\DaysOfTheWeek;
use Filament\Facades\Filament;
use Illuminate\Support\Carbon;
use Filament\Resources\Pages\CreateRecord;
use App\Filament\Mechanic\Resources\ScheduleResource;

class CreateSchedule extends CreateRecord
{
    protected static string $resource = ScheduleResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['owner_id'] = Filament::auth()->user()->id;
        $data['service_point_id'] = Filament::getTenant()->id;
    
        return $data;
    }
    
    protected function getRedirectUrl(): string
    {
        return $this->getResource()::getUrl('index');
    }
}
