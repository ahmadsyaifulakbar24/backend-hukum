<?php

namespace App\Http\Controllers\API\Report;

use App\Http\Controllers\Controller;
use App\Models\LegalProduct;
use Illuminate\Http\Request;

class TimelineController extends Controller
{
    public function timeline(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id']
        ]);

        $legal_product = LegalProduct::find($request->legal_product);
    }
}
