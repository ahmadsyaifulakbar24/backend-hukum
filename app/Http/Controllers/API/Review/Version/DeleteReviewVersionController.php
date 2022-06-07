<?php

namespace App\Http\Controllers\API\Review\Version;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\ReviewVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class DeleteReviewVersionController extends Controller
{
    public function __invoke(ReviewVersion $review_version)
    {
        $files = $review_version->note()->pluck('file')->toArray();
        $files = Arr::prepend($files, $review_version->file);

        Storage::disk('public')->delete($files);
        $review_version->delete();
        
        return ResponseFormatter::success(null, 'success delete review version data');
    }
}
