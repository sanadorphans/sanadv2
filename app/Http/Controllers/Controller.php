<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected function findBySlug($modelClass, $slug)
    {
        if (is_numeric($slug)) {
            $record = $modelClass::find($slug);
            if ($record) {
                return $record;
            }
        }

        return $modelClass::all()->first(function ($item) use ($slug) {
            $possibleFields = ['title_en', 'title_ar', 'name_en', 'name_ar', 'title'];
            foreach ($possibleFields as $field) {
                if (isset($item->$field) && \Illuminate\Support\Str::slug($item->$field) === $slug) {
                    return true;
                }
            }
            return false;
        });
    }

    protected function findOrFailBySlug($modelClass, $slug)
    {
        $record = $this->findBySlug($modelClass, $slug);
        if (!$record) {
            abort(404);
        }
        return $record;
    }
}