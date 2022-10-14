<?php

namespace App\Http\Controllers\API\History;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\History\HistoryResource;
use App\Models\History;
use Illuminate\Http\Request;

class GetHistoryController extends Controller
{
    public function get(Request $request)
    {
        $request->validate([
            'review_version_id' => ['required', 'exists:review_versions,id'],
            'limit' => ['nullable', 'integer']
        ]);
        $limit = $request->input('limit', 10);

        $history = History::where('review_version_id', $request->review_version_id);
        $result = $history->orderBy('created_at', 'DESC')->paginate($limit);

        return ResponseFormatter::success(HistoryResource::collection($result)->response()->getData(true), 'success get history data');
    }

    public function show(History $history)
    {
        return ResponseFormatter::success(new HistoryResource($history), 'success get history data');
    }
}
