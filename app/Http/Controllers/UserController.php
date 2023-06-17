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

        $users = User::query()
            ->orderBy('name')
            ->orderBy('last_name');

        if ($request->has('q')) {
            $q = '%'.$request->q.'%';

            $users->where('name', 'like', $q)
                ->orWhere('last_name', 'like', $q)
                ->orWhere('email', 'like', $q);
        }

        return view('users.index', [
            'users' => $users->paginate(50),
        ]);
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

    public function makeAdmin(Request $request, User $user) : mixed
    {
        $this->authorize('superadmin');

        if (! $user->hasRole('contestant')) {
            return redirect()->route('users.index')->dangerBanner('User can\'t be modified...');    
        }
        
        $user->role = 'admin';
        $user->save();

        return redirect()->route('users.index')->banner('User made admin!');
    }

    public function makeContestant(Request $request, User $user) : mixed
    {
        $this->authorize('superadmin');
        
        if (! $user->hasRole('admin')) {
            return redirect()->route('users.index')->dangerBanner('User can\'t be modified...');    
        }
        
        $user->role = 'contestant';
        $user->save();

        return redirect()->route('users.index')->banner('User made contestant!');
    }
}
