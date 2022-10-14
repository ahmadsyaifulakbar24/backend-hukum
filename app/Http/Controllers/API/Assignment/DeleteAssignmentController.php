<?php

namespace App\Http\Controllers\API\Assignment;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Models\Assignment;
use Illuminate\Http\Request;

class DeleteAssignmentController extends Controller
{
    public function __invoke(Assignment $assignment)
    {
        $assignment->delete();
        return ResponseFormatter::success(null, 'success delete assignment data');
    }
}
