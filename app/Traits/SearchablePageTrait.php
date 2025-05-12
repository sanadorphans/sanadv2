<?php
namespace App\Traits;

use Laravel\Scout\Searchable;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use TCG\Voyager\Traits\Translatable;
use Illuminate\Support\Facades\Schema;

trait SearchablePageTrait
{
    use Searchable;

    /**
     * Get the indexable data array for the model.
     *
     * @return array
     */
    public function toSearchableArray()
    {
        $baseScoutArray = method_exists(parent::class, 'toSearchableArray') ? parent::toSearchableArray() : [];

        $customArray = [
            'id' => $this->getScoutKey(),
            // Additional logic for translatable fields...
        ];

        return array_merge($baseScoutArray, $customArray);
    }

    /**
     * Get the value of the model's primary key.
     */
    public function getScoutKey()
    {
        return strtolower(class_basename($this)) . '_' . $this->getKey();
    }

    public function getScoutKeyName()
    {
        return 'id';
    }

    /**
     * Get the localized URL for the model.
     */
    public function getPageUrl($locale)
    {
        $slug = $this->getTranslatedAttribute('slug', $locale, config('app.fallback_locale'));
        return $slug ? LaravelLocalization::getLocalizedURL($locale, $slug) : LaravelLocalization::getLocalizedURL($locale, '/');
    }
}


// namespace App\Traits;

// use Laravel\Scout\Searchable;
// use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
// use TCG\Voyager\Traits\Translatable; // Assuming they still use this for translations within each page table

// trait SearchablePageTrait
// {
//     use Searchable;
//     // IMPORTANT: Each model using this trait MUST also use a Translatable trait
//     // and define its $translatable property.

//     /**
//      * Get the indexable data array for the model.
//      *
//      * @return array
//      */
//     public function toSearchableArray()
//     {
//         $array = [
//             'id' => $this->getScoutKey(), // Uses the model's primary key prefixed by model name
//             // 'model_class' => get_class($this), // Store the model class to know what type it is
//             // 'page_title_for_display' => null, // We'll populate this later
//             // 'page_slug_for_display' => null,  // We'll populate this later
//         ];

//         // This assumes each "page" model has 'title', 'slug', and 'body' as translatable fields.
//         // If they differ, this trait becomes more complex or needs configuration per model.
//         // For now, let's assume consistency in field names for searchable content.
//         $translatableFields = $this->translatable ?? ['title', 'details']; // Common fields

//         foreach (config('voyager.multilingual.locales', [config('app.fallback_locale')]) as $locale) {
//             foreach ($translatableFields as $field) {
//                 if (in_array($field, $this->getTranslatableAttributes() ?? [])) { // Check if field is actually translatable on THIS model
//                     $value = $this->getTranslatedAttribute($field, $locale, config('app.fallback_locale'));
//                     if ($field === 'details') {
//                         $array[$field . '_' . $locale] = strip_tags((string)$value);
//                     } else {
//                         $array[$field . '_' . $locale] = (string)$value;
//                     }
//                 }
//             }
//             if($field === 'details'){
//                 // Create a combined content field for better searching per locale
//                 $array['details_' . $locale] = implode(" ", [
//                     (string) $this->getTranslatedAttribute('title', $locale, config('app.fallback_locale')),
//                 ]);
//             }
//         }

//         // // Store the title and slug for the default locale for easier access if needed
//         // // These are more for the search result display convenience than for indexing itself
//         // $defaultLocale = config('app.default_locale', 'en');
//         // $array['page_title_for_display'] = (string) $this->getTranslatedAttribute('title_ar', $defaultLocale, $defaultLocale);
//         // $array['page_slug_for_display'] = (string) $this->getTranslatedAttribute('slug', $defaultLocale, $defaultLocale);


//         return $array;
//     }

//     /**
//      * Get the value of the model's primary key.
//      * This is used by Scout to uniquely identify this record in the search index.
//      * We prefix it with the model's "table" name (or class name) to ensure global uniqueness.
//      */
//     public function getScoutKey()
//     {
//         return strtolower(class_basename($this)) . '_' . $this->getKey();
//     }

//     public function getScoutKeyName()
//     {
//         return 'id'; // This isn't directly used if getScoutKey() is defined
//     }

//     // You will need a way to get the URL for these pages.
//     // This might need to be implemented in each specific page model if routes are very custom.
//     // Or, if there's a convention (e.g., based on the slug).
//     public function getPageUrl($locale)
//     {
//         // Default assumption: slug is the URL path
//         $slug = $this->getTranslatedAttribute('slug', $locale, config('app.fallback_locale'));
//         if ($slug) {
//             return LaravelLocalization::getLocalizedURL($locale, $slug);
//         }
//         // Fallback or error if no slug
//         return LaravelLocalization::getLocalizedURL($locale, '/'); // Or throw exception
//     }
// }
