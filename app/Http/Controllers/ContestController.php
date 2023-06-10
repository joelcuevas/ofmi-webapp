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

    public function create(Request $request)
    {
        abort_unless($request->user()->isAdmin(), 403);

        return view('contests.create');
    }

    public function store(Request $request)
    {
        abort_unless($request->user()->isAdmin(), 403);

        $this->validate($request, [
            'year' => 'required|max:6|unique:contests',
            'title' => 'required|max:150',
            'content' => 'required',
        ]);

        Contest::create([
            'year' => $request->year,
            'title' => $request->title,
            'content' => $request->content,
        ]);

        return redirect()->route('contests.index')->banner('Contest created!');
    }

    public function show(Request $request, Contest $contest)
    {
        abort_unless($request->user()->isAdmin(), 403);
    }

    public function edit(Request $request, Contest $contest)
    {
        abort_unless($request->user()->isAdmin(), 403);
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
