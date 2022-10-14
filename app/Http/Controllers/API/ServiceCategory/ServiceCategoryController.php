<?php

namespace App\Http\Controllers\API\ServiceCategory;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\ServiceCategory\ServiceCategoryResource;
use App\Models\ServiceCategory;
use Illuminate\Http\Request;

class ServiceCategoryController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'type' => ['nullable', 'in:IH,PUU']
        ]);
        
        $service_category = ServiceCategory::query();

        if($request->type) {
            $service_category->where('type', $request->type);
        }

        return ResponseFormatter::success(ServiceCategoryResource::collection($service_category->get()), 'success get service category data');
    }

    public function show(ServiceCategory $service_category)
    {
        return ResponseFormatter::success(new ServiceCategoryResource($service_category), 'success get service category data');
    }
}
