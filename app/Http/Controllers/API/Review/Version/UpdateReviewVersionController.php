<?php

namespace App\Http\Controllers\API\Review\Version;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewVersion\ReviewVersionResource;
use App\Models\ReviewVersion;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UpdateReviewVersionController extends Controller
{
    public function update(Request $request, ReviewVersion $review_version)
    {
        // validation
        $request->validate([
            'version_name' => ['required', 'string'],
            'file' => ['nullable', 'file'],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],
        ]);
        // set variable
        $inputReviewVerison = $request->except(['file', 'footnote']);
        if($request->file) {
            $inputReviewVerison['file'] = FileHelpers::upload_file('review_version/file', $request->file);
            Storage::disk('public')->delete($review_version->file);
        }

        // update review version 
        $review_version->update($inputReviewVerison);

        // update footnote
        if($request->footnote) {
            $notes = Arr::pluck($request->footnote, 'note');
            $review_version->footnote()->whereNotIn('note', $notes)->delete();
            $exists = $review_version->footnote()->pluck('note')->toArray();
            $new_footnote = array_values(array_diff($notes, $exists));
            if(!empty($new_footnote)) {
                foreach($new_footnote as $not_exists){
                    $inputFootnote[]['note'] = $not_exists;
                }
                $review_version->footnote()->createMany($inputFootnote);
            }
        } else {
            $review_version->footnote()->delete();
        }

        // create history 
        $review_version->history()->create([
            'user_id' => $request->user()->id,
            'type' => 'update_review_version'
        ]);

        // response
        return ResponseFormatter::success(new ReviewVersionResource($review_version));
    }
}
