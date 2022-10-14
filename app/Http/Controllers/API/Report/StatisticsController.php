<?php

namespace App\Http\Controllers\API\Report;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\LegalProduct\LegalProductByMonthResource;
use App\Http\Resources\LegalProduct\LegalProductByServiceCategoryResource;
use App\Models\LegalProduct;
use App\Models\ServiceCategory;
use App\Models\VwTotalLegalProductByServiceCategory;
use Illuminate\Http\Request;

class StatisticsController extends Controller
{
    public function legal_pruduct_by_service_category(Request $request)
    {
        $request->validate([
            'type' => ['nullable', 'in:PUU,IH']
        ]);
        $service_category = VwTotalLegalProductByServiceCategory::query();
        if($request->type) {
            $service_category->where('type', $request->type);
        }
        $result = $service_category->orderBy('order', 'ASC')->get();
        return ResponseFormatter::success(LegalProductByServiceCategoryResource::collection($result), 'success get legal product by service category data');
    }

    public function legal_product_by_month(Request $request)
    {
        $request->validate([
            'year' => ['required', 'integer'],
            'type' => ['nullable', 'in:PUU,IH']
        ]);

        $service_category = ServiceCategory::legalProductByMonth($request->year);
        if($request->type) {
            $service_category->where('type', $request->type);
        }
        $result = $service_category->orderBy('order', 'ASC')->get();
        return ResponseFormatter::success(LegalProductByMonthResource::collection($result), 'success get legal product by month data');
    }
}
