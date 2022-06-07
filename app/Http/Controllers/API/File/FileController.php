<?php

namespace App\Http\Controllers\API\File;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\File\FileResource;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class FileController extends Controller
{
    public function create(Request $request)
    {
        $request->validate([
            'legal_product_id' => [
                Rule::requiredIf(empty($request->review_version_id)),
                'exists:legal_products,id'
            ],
            'review_version_id' => [
                Rule::requiredIf(empty($request->legal_product_id)), 
                'exists:review_versions,id'
            ],
            'file' => ['required', 'file'],
            'type' => ['required', 'in:urgency_script,official_memo,draft,sk_team,review_verison_note']
        ]);

        $input = $request->except(['file']);
        $input['file'] = FileHelpers::upload_file($request->type, $request->file);
        $file = File::create($input);

        return ResponseFormatter::success(new FileResource($file), 'success create file data');
    }

    public function delete(File $file)
    {
        Storage::disk('public')->delete($file->file);
        return ResponseFormatter::success(null, 'success delete file data');
    }
}
