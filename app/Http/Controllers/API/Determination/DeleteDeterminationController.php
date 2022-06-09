<?php

namespace App\Http\Controllers\API\Determination;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Determination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteDeterminationController extends Controller
{
    public function __invoke(Determination $determination)
    {
        // delete file and finalization data
        Storage::disk('public')->delete($determination->file);
        $determination->delete();

        // response
        return ResponseFormatter::success(null, 'success delete determination data');
    }
}
