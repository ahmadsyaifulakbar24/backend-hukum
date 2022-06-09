<?php

namespace App\Http\Controllers\API\Review;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewDetailResource;
use App\Models\Review;
use Illuminate\Http\Request;

class UpdateReviewController extends Controller
{
    public function update(Request $request, Review $review)
    {
        $request->validate([
            'title' => ['required', 'string'],
        ]);

        $input = $request->only(['title']);
        $review->update($input);

        return ResponseFormatter::success(new ReviewDetailResource($review), 'success update review data');
    }

    public function progress(Request $request, Review $review)
    {
        $request->validate([
            'status' => ['required', 'integer', 'max:100']
        ]);

        $review->update($request->only('status'));
        return ResponseFormatter::success(new ReviewDetailResource($review), 'success update review progress data');
    }

}
