<?php

namespace App\Http\Controllers\API\LegalProduct;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\LegalProduct\LegalProductDetailResource;
use App\Models\LegalProduct;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateLegalProductController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'service_category_id' => ['required', 'exists:service_categories,id'],
            'title' => ['required', 'string'],
            'mandate_id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'mandate');
                })
            ],
            'completion_target' => ['required', 'date'],

            'urgency_script' => ['required', 'array'],
            'urgency_script.*.file' => ['required', 'file'],

            'official_memo' => ['required', 'array'],
            'official_memo.*.file' => ['required', 'file'],

            'draft' => ['required', 'array'],
            'draft.*.file' => ['required', 'file'],

            'sk_team' => [
                Rule::requiredIf(function() use ($request)  {
                    $service_category = ServiceCategory::find($request->service_category_id);
                    return $service_category->type == 'PUU';
                }),
                'array'
            ],
            'sk_team.*.file' => ['required_with:sk_team', 'file'],
        ]);

        $service_category = ServiceCategory::find($request->service_category_id);

        $input = $request->only([
            'service_category_id',
            'title',
            'mandate_id',
            'completion_target'
        ]);
        $input['created_by'] = $request->user()->id;

        // insert legal product data
        $legal_product = LegalProduct::create($input);
        
        // upload and insert urgency script document
        foreach ($request->urgency_script as $urgency_script) {
            $urgency_script = FileHelpers::upload_file('urgency_script', $urgency_script['file']);
            $legal_product->file()->create([
                'file' => $urgency_script,
                'type' => 'urgency_script'
            ]);
        }

        // upload and insert urgency official memo
        foreach ($request->official_memo as $official_memo) {
            $official_memo = FileHelpers::upload_file('official_memo', $official_memo['file']);
            $legal_product->file()->create([
                'file' => $official_memo,
                'type' => 'official_memo'
            ]);
        }

        // upload and insert urgency draft
        foreach ($request->draft as $draft) {
            $draft = FileHelpers::upload_file('draft', $draft['file']);
            $legal_product->file()->create([
                'file' => $draft,
                'type' => 'draft'
            ]);
        }

        // upload and insert urgency script sk team
        if($service_category->type == 'PUU') {
            foreach ($request->sk_team as $sk_team) {
                $sk_team = FileHelpers::upload_file('sk_team', $sk_team['file']);
                $legal_product->file()->create([
                    'file' => $sk_team,
                    'type' => 'sk_team'
                ]);
            }
        }

        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success create legal product data');
    }
}