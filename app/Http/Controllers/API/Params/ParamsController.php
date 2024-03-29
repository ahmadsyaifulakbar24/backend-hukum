<?php

namespace App\Http\Controllers\API\Params;

use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\Params\ParamResource;
use App\Models\Param;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ParamsController extends Controller
{
    public function get_eselon1() {
        return $this->param_response('eselon1', 'get eselon 1 data success');
    }

    public function get_eselon2(Request $request) {
        $request->validate([
            'eselon1_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'eselon1');
                })
            ],
        ]);

        $param = Param::where('parent_id', $request->eselon1_id)->get();
        return ResponseFormatter::success(ParamResource::collection($param), 'get eselon 2 data success');
    }

    public function get_mandate()
    {
        return $this->param_response('mandate', 'get mandate data success');
    }

    public function param_response($category, $message)
    {
        $param = Param::where('category', $category)->get();
        return ResponseFormatter::success(ParamResource::collection($param), $message);
    }
}
