<?php

namespace App\Http\Controllers\API\Finalization;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finalization\FinalizationResource;
use App\Models\Finalization;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UpdateFinalizationController extends Controller
{
    public function update(Request $request, Finalization $finalization)
    {
        $request->validate([
            'file' => ['nullable', 'file'],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],
        ]);

        // set variable 
        $input = $request->except(['file', 'footnote', 'note']);
        if($request->file) {
            Storage::disk('public')->delete($finalization->file);
            $input['file'] = FileHelpers::upload_file('finalization/file', $request->file);
        }

        // update finalization 
        $finalization->update($input);

        // update footnote
        if($request->footnote) {
            $notes = Arr::pluck($request->footnote, 'note');
            $finalization->footnote()->whereNotIn('note', $notes)->delete();
            $exists = $finalization->footnote()->pluck('note')->toArray();
            $new_footnote = array_values(array_diff($notes, $exists));
            if(!empty($new_footnote)) {
                foreach ($new_footnote as $not_exists) {
                    $inputFootnote[]['note'] = $not_exists;
                }
                $finalization->footnote()->createMany($inputFootnote);
            }
        }

        // response 
        return ResponseFormatter::success(new FinalizationResource($finalization), 'success get finalization data');
    }
}
