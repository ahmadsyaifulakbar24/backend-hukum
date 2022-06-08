<?php

namespace App\Http\Controllers\API\Finalization;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Finalization;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class DeleteFinalizationController extends Controller
{
    public function __invoke(Finalization $finalization)
    {        
        // get file on finalization data
        $files = ($finalization->type == 'finalization') ? $finalization->note()->pluck('file')->toArray() : [];
        $files = Arr::prepend($files, $finalization->file);

        // delete file and finalization data
        Storage::disk('public')->delete($files);
        $finalization->delete();

        // return response
        return ResponseFormatter::success(null, 'success delete finalization data');
    }
}
