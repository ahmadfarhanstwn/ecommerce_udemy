<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IndexController extends Controller
{
    public function index() {
        return view('frontend.index');
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('login');
    }

    public function editProfile() {
        $id = Auth::user()->id;
        $userData = User::find($id);
        return view('frontend.profile.edit_profile')->compact('userData');
    }
}
