<?php

namespace App\Http\Controllers\API\Review\Version;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewVersion\ReviewVersionResource;
use App\Models\Review;
use App\Models\ReviewVersion;
use Illuminate\Http\Request;

class CreateReviewVersionController extends Controller
{
    public function __invoke(Request $request)
    {
        // validation
        $request->validate([
            'review_id' => ['required', 'exists:reviews,id'],
            'version_name' => ['required', 'string'],
            'file' => ['required', 'file'],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],

            'note' => ['required', 'array'],
            'note.*.note' => ['required', 'file']
        ]);

        // set variable
        $user_id = $request->user()->id;
        $inputReviewVerison = $request->except(['file', 'footnote', 'note']);
        $inputReviewVerison['user_id'] = $user_id;
        $inputReviewVerison['review_id'] = $request->review_id;
        $inputReviewVerison['file'] = FileHelpers::upload_file('review_version/file', $request->file);

        // create review version
        $review_version = ReviewVersion::create($inputReviewVerison);

        // create footnote if exists
        if($request->footnote) {
            $review_version->footnote()->createMany($request->footnote);
        }

        // create note
        foreach($request->note as $note)
        {
            $path_note = FileHelpers::upload_file('review_version/note', $note['note']); 
            $notes[] = [
                'file' => $path_note,
                'type' => 'review_verison_note'
            ];
        }
        $review_version->note()->createMany($notes);

        // response
        return ResponseFormatter::success(new ReviewVersionResource($review_version));
    }
}
