<?php
// app/Http/Controllers/SearchController.php
namespace App\Http\Controllers;

use App\Models\AnnualReport;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\App; // For getting locale
// Or: use Illuminate\Support\Facades\Lang; // For translation
// Or: use Illuminate\Contracts\Translation\Translator; // Inject if preferred

class SearchbarController extends Controller
{
    public function search(Request $request)
    {
        $keyword = $request->input('q');
        $results = collect();

        if (empty($keyword)) {
            return view('search.results', ['results' => $results, 'keyword' => $keyword]);
        }

        $searchableModelConfigurations = Config::get('searchable.models');
        $currentLocale = App::getLocale(); // Get the current application locale (e.g., 'en', 'ar')

        foreach ($searchableModelConfigurations as $modelClass => $config) {
            $query = $modelClass::query();

            // Construct localized field names for searching
            $localizedSearchFields = [];
            foreach ($config['base_fields'] as $baseField) {
                // Assuming your Voyager translatable fields are suffixed with _locale (e.g., name_en, details_ar)
                // Adjust this if your Voyager setup uses a different pattern (e.g., JSON translations)
                $localizedSearchFields[] = $baseField . '_' . $currentLocale;
            }

            // Construct localized display title column name
            $localizedDisplayTitleColumn = $config['display_title_base_column'] . '_' . $currentLocale;

            $query->where(function ($q) use ($localizedSearchFields, $keyword) {
                foreach ($localizedSearchFields as $field) {
                    // Check if the column actually exists before querying to avoid errors
                    // This is a good practice if some locales might not have all fields
                    if (method_exists($q->getModel(), 'getFillable') && in_array($field, $q->getModel()->getFillable()) || \Schema::hasColumn($q->getModel()->getTable(), $field) ) {
                       $q->orWhere($field, 'LIKE', "%{$keyword}%");
                    }
                }
            });

            $modelResults = $query->get();

            foreach ($modelResults as $modelResult) {
                // Get the title from the localized column
                // Add a fallback or check if the property exists
                $title = $modelResult->{$localizedDisplayTitleColumn} ?? $modelResult->{$config['display_title_base_column']} ?? 'N/A';
                if($modelResult instanceof AnnualReport){
                    $url = '';
                    if (isset($config['is_direct_file_link']) && $config['is_direct_file_link']) {
                        $filePath = '';
                        if (!empty($config['file_model_relation'])) {
                            $relatedModel = $modelResult->{$config['file_model_relation']};
                            if ($relatedModel) {
                                $filePath = $relatedModel->{$config['file_column_on_related']};
                            }
                        } else {
                            $filePath = $modelResult->{$config['file_path_column_on_self']};
                        }
                        if ($filePath) {
                            $url = Storage::url($filePath); // Or asset('storage/' . $filePath) if link is setup
                        } else {
                            $url = '#'; // Fallback
                        }
                    } else {
                        $url = route($config['route_name'], [$config['route_param_key'] => $modelResult->{$config['route_param_value_column']}]);
                    }

                    $results->push([
                        'title' => $title,
                        'url' => $url, // Use the dynamically generated URL
                        'type' => __($config['type_label_key']), // Translate the type label
                        'is_file_download' => (isset($config['is_direct_file_link']) && $config['is_direct_file_link']) || (isset($config['is_file_download']) && $config['is_file_download']),
                        'model' => $modelResult,

                    ]);
                }else{
                    $results->push([
                        'title' => $title,
                        'url' => route($config['route_name'], [$config['route_param_key'] => $modelResult->{$config['route_param_value_column']}]),
                        'type' => __($config['type_label_key']), // Translate the type label
                        'model' => $modelResult,
                    ]);
                }
            }
        }

        $results = $results->sortBy('title');
        return view('search.results', ['results' => $results, 'keyword' => $keyword]);
    }


    // Optional: Helper to generate a snippet
    // protected function generateSnippet($model, $fields, $keyword, $length = 150)
    // {
    //     $textToSearch = '';
    //     foreach ($fields as $field) {
    //         $textToSearch .= strip_tags($model->{$field}) . ' '; // Combine content from searchable fields
    //     }
    //     $textToSearch = trim($textToSearch);

    //     $position = stripos($textToSearch, $keyword);
    //     if ($position === false) {
    //         return Str::limit($textToSearch, $length);
    //     }

    //     $start = max(0, $position - ($length / 2));
    //     $snippet = Str::substr($textToSearch, $start, $length);

    //     if ($start > 0) {
    //         $snippet = '...' . $snippet;
    //     }
    //     if ( ($start + $length) < Str::length($textToSearch) ) {
    //         $snippet = $snippet . '...';
    //     }
    //     return $snippet;
    // }
}
