<?php

namespace App\Http\Controllers\API\LegalProduct;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\LegalProduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteLegalProductController extends Controller
{
    public function __invoke(LegalProduct $legal_product)
    {
        if($legal_product->status == 'pending') {
            $files = $legal_product->file()->pluck('file')->toArray();
            Storage::disk('public')->delete($files);
            $legal_product->delete();
            return ResponseFormatter::success(null, 'success delete legal product data');
        } else {
            return ResponseFormatter::error([
                'message' => 'cannot delete this data'
            ], 'delete legal product failed', 422);
        }
    }
}
