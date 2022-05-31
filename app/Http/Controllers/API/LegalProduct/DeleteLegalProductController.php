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
        $files = $legal_product->file()->pluck('file')->toArray();
        Storage::disk('public')->delete($files);
        $legal_product->delete();
        return ResponseFormatter::success(null, 'success delete legal product data');
    }
}
