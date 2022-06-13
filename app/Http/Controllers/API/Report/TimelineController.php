<?php

namespace App\Http\Controllers\API\Report;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\LegalProduct\TimelineResource;
use App\Models\LegalProduct;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function timeline(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id']
        ]);

        $legal_product = LegalProduct::find($request->legal_product_id);
        return ResponseFormatter::success(new TimelineResource($legal_product), 'success get timeline data');
    }
}
