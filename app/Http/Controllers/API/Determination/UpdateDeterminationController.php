<?php

namespace App\Http\Controllers\API\Determination;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Determination\DeterminationResource;
use App\Models\Determination;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;

class UpdateDeterminationController extends Controller
{
    public function update(Request $request, Determination $determination)
    {
        $request->validate([
            'file' => ['required', 'file'],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],
        ]);

        // set variable
        $input = $request->except(['file', 'footnote']);
        if($request->file) {
            Storage::disk('public')->delete($determination->file);
            $input['file'] = FileHelpers::upload_file('determination/file', $request->file);
        }

        // update determination
        $determination->update($input);

        // update footnote
        if($request->footnote) {
            $notes = Arr::pluck($request->footnote, 'note');
            $determination->footnote()->whereNotIn('note', $notes)->delete();
            $exists = $determination->footnote()->pluck('note')->toArray();
            $new_footnote = array_values(array_diff($notes, $exists));

            if(!empty($new_footnote)) {
                foreach ($new_footnote as $not_exists) {
                    $inputFootnote[]['note'] = $not_exists;
                }
                $determination->footnote()->createMany($inputFootnote);
            }
        }

        // response 
        return ResponseFormatter::success(new DeterminationResource($determination), 'success update determination data');
    }
}
