<?php

namespace App\Http\Controllers\API\Determination;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Determination\DeterminationResource;
use App\Models\Determination;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateDeterminationController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id', 'unique:determinations,legal_product_id'],

            'file' => ['required', 'file'],

            'footnote' => ['nullable', 'array'],
            'footnote.*.note' => ['required_with:footnote', 'string'],

            'attachment' => ['nullable', 'array'],
            'attachment.*.attachment' => ['required_with:attachment', 'file'],
        ]);

        // create determination variable
        $input = $request->except(['file', 'footnote']);
        $input['user_id'] = $request->user()->id;
        $input['file'] = FileHelpers::upload_file('determination/file', $request->file);

        // create determination
        $determination = Determination::create($input);

        // create footnote if exists
        if($request->footnote)
        {
            $determination->footnote()->createMany($request->footnote);
        }

        // create attachment
        if($request->attachment) {
            foreach($request->attachment as $attachment) {
                $path_attachment = FileHelpers::upload_file('determination/attachment', $attachment['attachment']);
                $attachments[] = [
                    'file' => $path_attachment,
                    'type' => 'determination_attachment'
                ];
            }
            $determination->files()->createMany($attachments);
        }

        return ResponseFormatter::success(new DeterminationResource($determination), 'success get determination data');
    }
}
