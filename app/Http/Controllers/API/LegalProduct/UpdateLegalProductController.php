<?php

namespace App\Http\Controllers\API\LegalProduct;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\LegalProduct\LegalProductDetailResource;
use App\Models\LegalProduct;
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

        $legal_product->update(['status' => $request->status]);
        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success update status legal product data');
    }
}
