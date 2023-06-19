<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\View\View;

class UserController extends Controller
{
    public function index(Request $request) : View
    {
        $this->authorize('admin');

        return view('users.index');
    }

    public function completeProfile(Request $request)
    {
        if ($request->user()->profile_complete) {
            return redirect()->route('profile.show');
        }
        
        return view('auth.complete-profile', [
            'request' => $request,
            'user' => $request->user(),
        ]);
    }
}
