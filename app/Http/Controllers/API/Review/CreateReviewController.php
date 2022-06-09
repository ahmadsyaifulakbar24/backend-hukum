<?php

namespace App\Http\Controllers\API\Review;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewDetailResource;
use App\Models\Review;
use Illuminate\Http\Request;

class CreateReviewController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id'],
            'title' => ['required', 'string'],
        ]);

        $review = Review::create($request->all());
        return ResponseFormatter::success(new ReviewDetailResource($review), 'success create review data');
    }
}
