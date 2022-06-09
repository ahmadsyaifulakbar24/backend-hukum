<?php

namespace App\Http\Controllers\API\Comment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Finalization;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class GetCommentController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'type' => ['required', 'in:review,finalization'],
            'review_id' => [
                Rule::requiredIf($request->type == 'review'),
                'exists:reviews,id'
            ],
            'finzalization' => [
                Rule::requiredIf($request->type == 'finzalization'),
                'exists:finalizations,id'
            ],
        ]);

        if($request->type == 'review') {
            $review = Review::find($request->review_id);
            $result = $review->comment;
        } else if($request->type == 'finalization_id') {
            $finalization = Finalization::find($request->finalization_id);
            $result = $finalization->comment;
        }

        return ResponseFormatter::success(CommentResource::collection($result), 'success get comment data');
    }
}
