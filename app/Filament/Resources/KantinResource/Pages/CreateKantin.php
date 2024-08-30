<?php

namespace App\Filament\Resources\KantinResource\Pages;

use App\Filament\Resources\KantinResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateKantin extends CreateRecord
{
    protected static string $resource = KantinResource::class;

    protected function getRedirectUrl(): string
{
    return $this->getResource()::getUrl('index');
}
}
