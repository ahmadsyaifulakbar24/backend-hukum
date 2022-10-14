<?php

namespace App\Http\Controllers\API\Comment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use Illuminate\Http\Request;

class DeleteCommentController extends Controller
{
    public function __invoke(Comment $comment)
    {
        $comment->delete();
        return ResponseFormatter::success(null, 'success delete comment data');
    }
}
