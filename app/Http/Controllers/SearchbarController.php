<?php
// app/Http/Controllers/SearchController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Config; // To get the list of models
use Mcamara\LaravelLocalization\Facades\LaravelLocalization; // Correct import
use Illuminate\Support\Facades\Schema;

class SearchbarController extends Controller
{

public function search(Request $request)
{
    $keyword = $request->input('q');
    $allProcessedResults = [];
    $currentLocale = App::getLocale();
    $title = 'title' . '_' . $currentLocale;
    $details = 'details' . '_' . $currentLocale;

    if ($keyword) {
        $pageModelsToSearch = Config::get('searchable_pages.models', []);

        foreach ($pageModelsToSearch as $modelClass) {
            if (class_exists($modelClass) && method_exists($modelClass, 'search')) {
                $columns = Schema::getColumnListing((new $modelClass)->getTable());
                $searchableColumns = array_filter($columns, fn($column) => str_contains($column, $currentLocale) || str_contains($column, 'title') || str_contains($column, 'details'));

                $scoutResults = $modelClass::search($keyword)
                    ->where(function ($query) use ($searchableColumns, $keyword) {
                        foreach ($searchableColumns as $column) {
                            $query->orWhere($column, 'LIKE', "%{$keyword}%");
                        }
                    })
                    ->get();

                $scoutResults = $modelClass::search($keyword)->get();

                foreach ($scoutResults as $hit) {
                    $body = strip_tags((string)$details);
                    $contentToCountIn = strtolower((string)$title . " " . (string)$body);
                    $keywordCount = substr_count($contentToCountIn, strtolower($keyword));

                    if ($keywordCount > 0) {
                        try {
                            $url = $hit->getPageUrl($currentLocale);
                        } catch (\Exception $e) {
                            $url = LaravelLocalization::getLocalizedURL($currentLocale, '/');
                        }

                        $allProcessedResults[] = [
                            'id' => $hit->getScoutKey(),
                            'url' => $url,
                            'title' => $title,
                            'snippet' => Str::limit($body, 200),
                            'keyword_count' => $keywordCount,
                            'type' => class_basename($modelClass)
                        ];
                    }
                }
            }
        }

        usort($allProcessedResults, fn($a, $b) => $b['keyword_count'] <=> $a['keyword_count']);
    }

    return view('search.results', [
        'keyword' => $keyword,
        'results' => $allProcessedResults,
    ]);
}

    // public function search(Request $request)
    // {
    //     $keyword = $request->input('q');
    //     $allProcessedResults = [];
    //     $currentLocale = App::getLocale();

    //     if ($keyword) {
    //         $pageModelsToSearch = Config::get('searchable_pages.models', []);

    //         foreach ($pageModelsToSearch as $modelClass) {
    //             if (class_exists($modelClass) && method_exists($modelClass, 'search')) {
    //                 $this->info("Searching in model: {$modelClass}"); // For logging/debugging

    //                 // Perform the search using Scout for this specific model
    //                 $scoutResults = $modelClass::search($keyword)
    //                     // ->within(config('scout.prefix').Str::snake(class_basename($modelClass)).'_'.$currentLocale) // If you try per-locale indexes
    //                     ->get();

    //                 foreach ($scoutResults as $hit) {
    //                     // $hit is an instance of $modelClass (e.g., AboutUsPage)
    //                     // It should have the SearchablePageTrait methods and its own translatable fields.

    //                     $title = $hit->getTranslatedAttribute('title', $currentLocale, config('app.fallback_locale'));
    //                     $body = strip_tags((string)$hit->getTranslatedAttribute('details', $currentLocale, config('app.fallback_locale'))); // Assume 'body' or a common field name
    //                     // $slug = $hit->getTranslatedAttribute('slug', $currentLocale, config('app.fallback_locale'));

    //                     // Construct the content used for keyword counting from fields known to be on THIS model
    //                     // This part might need to be more dynamic if 'body' isn't the universal content field.
    //                     $contentToCountIn = strtolower(
    //                         (string)$title . " " .
    //                         (string)$body . " "  // Assuming 'body' or similar primary content field
    //                     );

    //                     $keywordCount = substr_count($contentToCountIn, strtolower($keyword));

    //                     if ($keywordCount > 0) {
    //                         try {
    //                             $url = $hit->getPageUrl($currentLocale); // Use the method from the trait/model
    //                         } catch (\Exception $e) {
    //                             $this->error("Could not get URL for {$modelClass} with ID {$hit->id}");
    //                             $url = LaravelLocalization::getLocalizedURL($currentLocale, '/'); // Fallback URL
    //                         }

    //                         $allProcessedResults[] = [
    //                             'id' => $hit->getScoutKey(), // The unique key we defined
    //                             'url' => $url,
    //                             'title' => $title,
    //                             'snippet' => Str::limit($body, 200),
    //                             'keyword_count' => $keywordCount,
    //                             'type' => class_basename($modelClass) // So you know what kind of page it is
    //                         ];
    //                     }
    //                 }
    //             }
    //         }

    //         // Sort all combined results by keyword count
    //         usort($allProcessedResults, function ($a, $b) {
    //             return $b['keyword_count'] <=> $a['keyword_count'];
    //         });
    //     }

    //     return view('search.results', [
    //         'keyword' => $keyword,
    //         'results' => $allProcessedResults,
    //     ]);
    // }

    // // Helper methods for logging if needed (optional)
    // private function info($message) {
    //     if (app()->runningInConsole()) {
    //         // For Artisan commands, you might use $this->output
    //     } else {
    //         logger()->info('[SearchController] ' . $message);
    //     }
    // }
    // private function error($message) {
    //     if (app()->runningInConsole()) {
    //          // For Artisan commands, you might use $this->output
    //     } else {
    //         logger()->error('[SearchController] ' . $message);
    //     }
    // }
}
