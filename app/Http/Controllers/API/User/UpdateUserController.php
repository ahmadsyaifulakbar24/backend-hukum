<?php

namespace App\Http\Controllers\API\User;

use App\Helpers\FileHelpers;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserDetailResource;
use App\Http\Resources\User\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class UpdateUserController extends Controller
{
    public function update(Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:users,id'],
            'name' => ['required', 'string'],
            'nip' => ['nullable', 'unique:users,nip'],
            'phone_number' => ['required', 'numeric', 'digits_between:7,15'],
            'eselon1_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) {
                    return $query->where('category', 'eselon1');
                })
            ],
            'eselon2_id' => [
                'required',
                Rule::exists('params', 'id')->where(function ($query) use ($request) {
                    return $query->where('parent_id', $request->eselon1_id);
                })
            ],
            'position' => ['required', 'string'],
        ]);

        $user = User::find($request->id);
        $user->update([
            'name' => $request->name,
            'nip' => $request->nip,
            'phone_number' => $request->phone_number,
            'eselon1_id' => $request->eselon1_id,
            'eselon2_id' => $request->eselon2_id,
            'position' => $request->position,
        ]);

        return ResponseFormatter::success(new UserResource($user), 'update user data success');
    }

    public function change_password (Request $request)
    {
        $request->validate([
            'id' => ['required', 'exists:users,id'],
            'old_password' => ['required', 'string'],
            'password' => ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $user = User::find($request->id);
        if(!Hash::check($request->old_password, $user->password)) {
            return ResponseFormatter::error([
                'message' => 'old password is invalid'
            ], 'change password data failed', 422);
        }

        $user->update([
            'password' => Hash::make($request->password)
        ]);

        return ResponseFormatter::success(new UserResource($user), 'change password data success');
    }

    public function photo_profile (Request $request, User $user)
    {
        $request->validate([
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg,gif,svg', 'max:5120']
        ]);

        if(!empty($user->photo)) {
            Storage::disk('public')->delete($user->photo);
        }
        
        $input['photo'] = FileHelpers::upload_file('profile', $request->photo);
        $user->update($input);
        return ResponseFormatter::success(new UserDetailResource($user), 'success update photo profile data');
    }
}
