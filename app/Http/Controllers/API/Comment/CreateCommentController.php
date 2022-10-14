<?php

namespace App\Http\Controllers\API\Comment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Comment\CommentResource;
use App\Models\Finalization;
use App\Models\LegalProduct;
use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateCommentController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'type' => ['required', 'in:review,finalization'],
            'review_id' => [
                Rule::requiredIf($request->type == 'review'),
                'exists:reviews,id'
            ],
            'legal_product_id' => [
                Rule::requiredIf($request->type == 'finalization'),
                'exists:legal_products,id'
            ],
            'comment' => ['required', 'string']
        ]);

        // create variable
        $user_id = $request->user()->id;
        $input = $request->only(['comment', 'type']);
        $input['user_id'] = $user_id;

        if($request->type == 'review') {
            $review = Review::find($request->review_id);
            $comment = $review->comment()->create($input);
        } else if($request->type == 'finalization') {
            $legal_product = LegalProduct::find($request->legal_product_id);
            $comment = $legal_product->comment()->create($input);
        }

        return ResponseFormatter::success(new CommentResource($comment), 'success create comment data');
    }
}
