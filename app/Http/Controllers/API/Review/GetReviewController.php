<?php

namespace App\Http\Controllers\API\Review;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Review\ReviewDetailResource;
use App\Http\Resources\Review\ReviewResource;
use App\Models\Review;
use Illuminate\Http\Request;

class GetReviewController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id'],
            'limit_page' => ['nullable', 'integer']
        ]);

        $limit_page = $request->input('limit_page', 10);

        $review = Review::where('legal_product_id', $request->legal_product_id)->orderBy('created_at', 'DESC');

        return ResponseFormatter::success(ReviewResource::collection($review->paginate($limit_page))->response()->getData(true), 'success get review data');
    }

    public function show (Review $review)
    {
        return ResponseFormatter::success(new ReviewDetailResource($review), 'success get review detail data');
    }
}
