<?php

namespace App\Http\Controllers\API\Assignment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Models\Assignment;
use Illuminate\Http\Request;

class GetAssignmentController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id'],
        ]);

        $assignment = Assignment::where('legal_product_id', $request->legal_product_id)->get();
        return ResponseFormatter::success(AssignmentResource::collection($assignment), 'success get assignment data');
    }

    public function show(Assignment $assignment)
    {
        return ResponseFormatter::success(new AssignmentResource($assignment), 'success get assignment data');
    }
}
