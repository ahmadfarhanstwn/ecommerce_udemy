<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AdminProfileController extends Controller
{
    public function profilePage() {
        $adminData = Admin::find(1);
        return view('admin.profile', compact('adminData'));
    }

    public function editProfilePage(){
        $adminData = Admin::find(1);
        return view('admin.edit_profile', compact('adminData'));
    }

    public function updateProfile(Request $request) {
        $adminData = Admin::find(1);
        $adminData->email = $request->email;
        $adminData->name = $request->name;
        if ($request->file('profile_photo_path')) {
            $file = $request->file('profile_photo_path');
            unlink(public_path('upload/admin_images/' . $adminData->profile_photo_path));
            $file_name = date('YmdHi') . $file->getClientOriginalName();
            $file->move(public_path('upload/admin_images'), $file_name);
            $adminData['profile_photo_path'] = $file_name;
        }
        $adminData->save();

        $notification = [
            'message' => 'Admin profile has succesfully updated',
            'alert-type' => 'success',
        ];

        return redirect()->route('admin.profile')->with($notification);
    }

    public function changePassword() {
        return view('admin.change_password');
    }

    public function updateChangePassword(Request $request) {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed'
        ]);

        $hashedPassword = Admin::find(1)->password;
        if (!Hash::check($request->current_password, $hashedPassword)) {
            $notification = [
                'message' => 'Your current password is invalid',
                'alert-type' => 'error'
            ];
            return redirect()->back()->with($notification);
        }

        $adminData = Admin::find(1);
        $adminData->password = Hash::make($request->password);
        $adminData->save();
        Auth::logout();
        $notification = [
            'message' => 'Your password has succesfully changed, Kindly relogin with your new password',
            'alert-type' => 'success'
        ];
        return redirect()->route('admin.logout')->with($notification);
    }
}
