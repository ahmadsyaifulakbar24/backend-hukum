<?php

namespace App\Http\Controllers\API\LegalProduct;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\LegalProduct\LegalProductDetailResource;
use App\Http\Resources\LegalProduct\LegalProductResource;
use App\Models\LegalProduct;
use Http\Message\ResponseFactory;
use Illuminate\Http\Request;

class GetLegalProductController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'created_by' => ['nullable', 'exists:users,id'],
            'search' => ['nullable', 'string'],
            'limit_page' => ['nullable', 'int']
        ]);

        $limit_page = $request->input('limit_page', 10);
        $legal_product = LegalProduct::query();

        if($request->user_id) {
            $legal_product->where('created_by', $request->created_by);
        }

        if($request->search)
        {
            $legal_product->where('title', $request->search);
        }

        return ResponseFormatter::success(LegalProductResource::collection($legal_product->paginate($limit_page))->response()->getData(true), 'success get legel product data');
    }

    public function show (LegalProduct $legal_product) 
    {
        return ResponseFormatter::success(new LegalProductDetailResource($legal_product), 'success get legal product detail');
    }
}
