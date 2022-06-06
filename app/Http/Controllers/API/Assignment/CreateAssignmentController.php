<?php

namespace App\Http\Controllers\API\Assignment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Assignment\AssignmentResource;
use App\Models\LegalProduct;
use Illuminate\Http\Request;

class CreateAssignmentController extends Controller
{
    public function __invoke(Request $request)
    {
        $request->validate([
            'legal_product_id' => ['required', 'exists:legal_products,id'],
            'user_id' => ['required', 'exists:users,id'],
        ]);

        $legal_product = LegalProduct::find($request->legal_product_id);
        $assignment = $legal_product->assignment()->create([ 'user_id' => $request->user_id ]);

        return ResponseFormatter::success(new AssignmentResource($assignment), 'success create assignment data');
    }
}
