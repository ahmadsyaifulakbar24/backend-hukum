<?php

namespace App\Http\Controllers\API\Review;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Review;
use Illuminate\Http\Request;

class DeleteReviewController extends Controller
{
    public function delete(Review $review)
    {
        $total_review_version = $review->review_version()->count();

        if($total_review_version == 0) {
            $review->delete();
            return ResponseFormatter::success(null, 'success delete review data');
        } else {
            return ResponseFormatter::error([
                'message' => 'cannot delete this data'
            ], 'delete review data failed', 422);
        }       
    }
}
