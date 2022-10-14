<?php

namespace App\Http\Controllers\API\LegalProduct;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\LegalProduct\LegalProductDetailResource;
use App\Models\LegalProduct;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateLegalProductController extends Controller
{
    public function update(Request $request, LegalProduct $legal_product)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'mandate_id' => [
                'nullable',
                Rule::exists('params', 'id')->where(function($query) {
                    return $query->where('category', 'mandate');
                })
            ],
            'completion_target' => ['required', 'date'],
        ]);

        $legal_product->update($request->all());
        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success update legal product data');
    }

    public function status(Request $request, LegalProduct $legal_product)
    {
        $request->validate([
            'status' => ['required', 'in:pending,process,finish,canceled']
        ]);
        $input = $request->only(['status']);
        $input['finish_date'] = ($request->status == 'finish') ? Carbon::now() : null;
        if($request->status == 'process' && $legal_product->assignment_start_date == null) {
            $input['assignment_start_date'] = Carbon::now();
        }
        
        $legal_product->update($input);

        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success update status legal product data');
    }

    public function finalization_progress(Request $request, LegalProduct $legal_product)
    {
        $request->validate([
            'finalization_progress' => ['required', 'integer', 'max:100']
        ]);

        $input = $request->only(['finalization_progress']);
        $input['finalization_finish_date'] = ($request->finalization_progress == 100) ? Carbon::now() : null;
        $legal_product->update($input);
        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success update legal product data');
    }
    
    public function start_step(Request $request, LegalProduct $legal_product)
    {
        $request->validate([
            'type' => ['required', 'in:finalization,determination'],
        ]);

        $error = ResponseFormatter::error([
            'message' => 'start date data already be teken'
        ], 'update start date data failed', 422);

        if($request->type == 'finalization') {
            if($legal_product->finalization_start_date == null) {
                $input['finalization_start_date'] = Carbon::now();
            } else {
                return $error;         
            }
        } else if ($request->type == 'determination') {
            if($legal_product->determination_start_date == null) {
                $input['determination_start_date'] = Carbon::now();
            } else {
                return $error;
            }
        }
        
        $legal_product->update($input);
        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success update legal product start date data', 200);
    }
}
