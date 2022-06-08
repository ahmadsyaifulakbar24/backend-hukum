<?php

namespace App\Http\Controllers\API\Finalization;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finalization\FinalizationResource;
use App\Models\Finalization;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateFinalizationController extends Controller
{
    public function __invoke(Request $request)
    {
        // validation
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id'],
            'file' => ['required', 'file'],
            'type' => ['required', 'in:finalization,original'],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],

            'note' => [
                Rule::requiredIf($request->type == 'finalization'), 
                'array'
            ],
            'note.*.note' => ['required_with:note', 'file']
        ]);

        // create input variable
        $input = $request->except(['file', 'footnote', 'note']);
        $input['file'] = FileHelpers::upload_file('finalization/file', $request->file);
        $finalization = Finalization::create($input);

        // create footnote if exists
        if($request->footnote) {
            $finalization->footnote()->createMany($request->footnote);
        }

        if($request->type == 'finalization') {
            foreach($request->note as $note) {
                $path_note = FileHelpers::upload_file('finalization/note', $note['note']);
                $notes[] = [
                    'file' => $path_note,
                    'type' => 'finalization_note'
                ];
            }

            $finalization->note()->createMany($notes);
        }

        return ResponseFormatter::success(new FinalizationResource($finalization), 'success create finalization data');
    }
}
