<?php

namespace App\Http\Controllers\API\Finalization;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Finalization\FinalizationResource;
use App\Models\Finalization;
use Illuminate\Http\Request;

class GetFinalizationController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id'],
            'type' => ['nullable', 'in:finalization,original'],
        ]);

        $finalization = Finalization::where('legal_product_id', $request->legal_product_id);

        if($request->type) {
            $finalization->where('type', $request->type);
        }

        $result = $finalization->get();

        return ResponseFormatter::success(FinalizationResource::collection($result), 'success get finalization data');
    }

    public function show(Finalization $finalization)
    {
        return ResponseFormatter::success(new FinalizationResource($finalization), 'success show finallization data');
    }
}
