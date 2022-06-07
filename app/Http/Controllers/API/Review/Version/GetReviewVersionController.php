<?php

namespace App\Http\Controllers\API\Review\Version;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewVersion\ReviewVersionResource;
use App\Models\ReviewVersion;
use Illuminate\Http\Request;

class GetReviewVersionController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'review_id' => ['required', 'exists:reviews,id'],
        ]);

        $review_version = ReviewVersion::where('review_id', $request->review_id)->get();
        return ResponseFormatter::success(ReviewVersionResource::collection($review_version), 'success get review version data');
    }

    public function show(ReviewVersion $review_version)
    {
        return ResponseFormatter::success(new ReviewVersionResource($review_version), 'success get review version data');
    }
}
