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
            'type' => [
                'required', 
                'in:finalization,original',
                Rule::unique('finalizations')->where(function($query) use ($request) {
                    return $query->where([
                        ['legal_product_id', $request->legal_product_id],
                        ['type', $request->type]
                    ]);
                })
            ],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],

            'attachment' => ['nullable', 'array'],
            'attachment.*.attachment' => ['required_with:attachment', 'file'],
        ]);

        // create input variable
        $input = $request->except(['file', 'footnote', 'note']);
        $input['file'] = FileHelpers::upload_file('finalization/file', $request->file);

        // create finalization
        $finalization = Finalization::create($input);

        // create footnote if exists
        if($request->footnote) {
            $finalization->footnote()->createMany($request->footnote);
        }

        // create attachment
        if($request->attachment) {
            foreach($request->attachment as $attachment) {
                $path_attachment = FileHelpers::upload_file('finalization/attachment', $attachment['attachment']);
                $attachments[] = [
                    'file' => $path_attachment,
                    'type' => 'finalization_attachment'
                ];
            }
            $finalization->note()->createMany($attachments);
        }

        return ResponseFormatter::success(new FinalizationResource($finalization), 'success create finalization data');
    }
}
