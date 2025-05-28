<?php

namespace App\Http\Controllers\CMS;

use App\Models\AnnualReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class TechnicalReportsController extends Controller
{
    //
    public function index()
    {
        $reports = AnnualReport::orderBy('order')->get();
        return view('cms.technical_reports.index',compact(['reports']));
    }
     public function download($id)
    {
        $annualReport = AnnualReport::findOrFail($id); // Eager load if needed
        $file = 'file' .'_'. app()->getLocale();
        $title = 'title' . '_'. app()->getLocale();

        // Assuming AnnualReport has a 'technicalReport' relationship
        // And TechnicalReport has a 'file' attribute storing the path within your storage disk
        if ($annualReport->$file) {
            if( $annualReport->$file == '[]') {
                $filePath = json_decode($annualReport->file_ar)[0]->download_link; // e.g., 'technical_reports/report_2023.pdf'

            }else{
                $filePath = json_decode($annualReport->$file)[0]->download_link; // e.g., 'technical_reports/report_2023.pdf'
            }
            // Ensure the file exists on your configured storage disk (e.g., 'public', 's3')
            if (Storage::disk('public')->exists($filePath)) {
                // Option 1: Simple Download Response (good for smaller files, less memory efficient for large ones)
                // return Storage::disk($disk)->download($filePath, $annualReport->title . '.pdf');

                // Option 2: Streamed Response (better for larger files)
                return Storage::disk('public')->response($filePath, $annualReport->$title . '.pdf', [
                    'Content-Type' => 'application/pdf', // Set appropriate MIME type
                    // 'Content-Disposition' => 'inline; filename="' . $annualReport->title . '.pdf"' // To open in browser
                ]);

            } else {
                // Log::error("File not found for Annual Report ID {$id}: {$filePath} on disk {$disk}");
                abort(404, 'File not found.');
            }
        } else {
            // Log::warning("No technical report or file path associated with Annual Report ID {$id}");
            abort(404, 'Report file information is missing.');
        }
    }
}
