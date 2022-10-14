<?php

namespace App\Http\Controllers\API\Determination;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Determination\DeterminationResource;
use App\Models\Determination;
use App\Models\LegalProduct;
use Illuminate\Http\Request;

class GetDeterminationController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id']
        ]);
        
        $legal_product = LegalProduct::find($request->legal_product_id);
        $result = $legal_product->determination;

        // response
        if(!empty($result)) {
            return ResponseFormatter::success(new DeterminationResource($result), 'success get determination data');
        } else {
            return ResponseFormatter::success(null, 'determination data not found');
        }
    }

    public function show(Determination $determination)
    {
        return ResponseFormatter::success(new DeterminationResource($determination), 'success get determination data');
    }
}
