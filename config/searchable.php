<?php

// config/searchable.php
use App\Models\News;
use App\Models\Board;
use App\Models\Carrer;
use App\Models\Program;
use App\Models\Service;
use App\Models\Aspiration;
use App\Models\SubProgram;
use App\Models\SubService;
use App\Models\TeamMember;
use App\Models\Certificate;
use App\Models\AnnualReport;

return [
    'models' => [
        Board::class => [
            'base_fields' => ['name', 'position', 'details'], // Base field names
            'route_name' => 'web.board.show',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'name', // Base column for the display title
            'type_label_key' => 'lang.board_member', // Translation key for the type
        ],
        TeamMember::class => [
            'base_fields' => ['name', 'position', 'details'],
            'route_name' => 'web.team_members.show',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'name',
            'type_label_key' => 'lang.staff', // Example, adjust to your lang file
        ],
        Service::class => [
            'base_fields' => ['title','details'], // Base field names
            'route_name' => 'web.pages.services',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.services', // Translation key for the type
        ],
        SubService::class => [
            'base_fields' => ['title','details'],
            'route_name' => 'web.pages.sub_services',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.services', // Example, adjust to your lang file
        ],
        Program::class => [
            'base_fields' => ['title','details'],
            'route_name' => 'web.pages.programs',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.our_programs', // Example, adjust to your lang file
        ],
        SubProgram::class => [
            'base_fields' => ['title','details'], // Base field names
            'route_name' => 'web.pages.sub_Programs',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.our_programs', // Translation key for the type
        ],
        News::class => [
            'base_fields' => ['title','details'], // Base field names
            'route_name' => 'web.news.show',
            'route_param_key' => 'id',
            'route_param_value_column' => 'id',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.news', // Translation key for the type
        ],
        // Add more models here
        AnnualReport::class => [
            'base_fields' => ['title'], // e.g., title of the report
            // Option 1: If you have a dedicated download route for AnnualReport files
            'route_name' => 'web.annual_report.download', // A NEW route you will create
            'route_param_key' => 'id', // Or 'annual_report_id', or 'slug' depending on your route
            'route_param_value_column' => 'id', // The 'id' of the AnnualReport model instance
            'display_title_base_column' => 'title',
            'type_label_key' => 'lang.technical_reports', // Or 'lang.technical_reports' if they are the same
            'is_file_download' => true, // Custom flag to identify this type
            'file_model_relation' => null, // Set to null if the file path is directly on AnnualReport
                                          // Or, if the file is on a related model:
                                          // 'file_model_relation' => 'technicalReport', // Name of the Eloquent relationship
                                          // 'file_column_on_related' => 'file', // Column on TechnicalReport model storing the file path
        ],
        Carrer::class => [
            'base_fields' => ['title'], // Base field names
            'route_name' => 'web.pages.vacancies',
            'route_param_key' => '',
            'route_param_value_column' => '',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.join_wataneya', // Translation key for the type
        ],
        Certificate::class => [
            'base_fields' => ['title','details'], // Base field names
            'route_name' => 'web.pages.certificates',
            'route_param_key' => '',
            'route_param_value_column' => '',
            'display_title_base_column' => 'title', // Base column for the display title
            'type_label_key' => 'lang.awards', // Translation key for the type
        ],
        // Aspiration::class => [
        //     'base_fields' => ['details'], // Base field names
        //     'route_name' => 'web.pages.Aspirations',
        //     'route_param_key' => '',
        //     'route_param_value_column' => '',
        //     'display_title_base_column' => 'lang.Our_Aspirations', // Base column for the display title
        //     'type_label_key' => 'lang.Our_Aspirations', // Translation key for the type
        // ],
    ],
];
