<?php

namespace App\Http\Controllers\API\Assignment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Http\Resources\Assignment\GroupByLegalProductResource;
use App\Models\Assignment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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

    public function assignment_by_legal_product(Request $request)
    {
        $request->validate([
            'paginate' => ['required', 'in:0,1'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);

        $assignment = Assignment::select(
                        'legal_product_id',
                        'user_id',
                        DB::raw('count(*) as total')
                    )
                    ->groupBy('user_id');
        $result = ($request->paginate) ? $assignment->paginate($limit) : $assignment->get();

        return ResponseFormatter::success(GroupByLegalProductResource::collection($result)->response()->getData(true), 'success get assignment by legal product data');
    }
}
