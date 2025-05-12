<?php

use App\Models\News;
use App\Models\Impact;
use App\Models\Partner;
use App\Models\Program;
use App\Models\Service;
use App\Models\Alliance;
use App\Models\Aspiration;
use App\Models\SubProgram;
use App\Models\SubService;
use App\Models\AnnualReport;

return [
    'models' => [
        AnnualReport::class,
        Aspiration::class,
        Partner::class,
        News::class,
        Impact::class,
        Alliance::class,
        Program::class,
        SubProgram::class,
        Service::class,
        SubService::class,
        // ... add every "page" model here
    ],
];
