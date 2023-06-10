<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index(Request $request)
    {
        abort_unless($request->user()->isAdmin(), 403);

        $contests = Contest::orderBy('year', 'desc');

        if ($request->has('q')) {
            $q = '%'.$request->q.'%';

            $contests->where('title', 'like', $q)
                ->orWhere('year', 'like', $q);
        }

        return view('contests.index', [
            'contests' => $contests->paginate(50),
        ]);
    }

    public function show(Request $request, Contest $contest)
    {
        abort_unless($request->user()->isAdmin(), 403);

        return view('contests.show', ['contest' => $contest]);
    }

    public function edit(Request $request, Contest $contest)
    {
        abort_unless($request->user()->isAdmin(), 403);

        return view('contests.edit', ['contest' => $contest]);
    }

    public function update(Request $request, Contest $contest)
    {
        abort_unless($request->user()->isAdmin(), 403);
    }

    public function destroy(Request $request, Contest $contest)
    {
        abort_unless($request->user()->isAdmin(), 403);
    }
}
