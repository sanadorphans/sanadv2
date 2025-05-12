<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config; // To get the list of models

class SearchIndexAllPages extends Command
{
    protected $signature = 'search:index-all-pages';
    protected $description = 'Imports all configured page-like models into the search index.';

    public function handle()
    {
        $pageModels = Config::get('searchable_pages.models', []);

        if (empty($pageModels)) {
            $this->warn('No page models configured in config/searchable_pages.php. Nothing to index.');
            return 1;
        }

        $this->info('Starting import for configured page models...');

        foreach ($pageModels as $modelClass) {
            if (class_exists($modelClass)) {
                $this->line("Importing: {$modelClass}");
                try {
                    // Check if model uses Searchable trait
                    if (!in_array(\Laravel\Scout\Searchable::class, class_uses_recursive($modelClass))) {
                        $this->error("Model {$modelClass} does not use the Laravel\Scout\Searchable trait. Skipping.");
                        continue;
                    }
                    Artisan::call('scout:import', ['model' => $modelClass], $this->getOutput());
                } catch (\Exception $e) {
                    $this->error("Failed to import {$modelClass}: " . $e->getMessage());
                }
            } else {
                $this->warn("Model class not found: {$modelClass}");
            }
        }

        $this->info('All configured page models processed.');
        return 0;
    }
}
