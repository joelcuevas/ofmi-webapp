<?php

namespace App\Http\Controllers;

use App\Models\Contest;
use Illuminate\Http\Request;

class ContestController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');

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
        $this->authorize('admin');

        return view('contests.show', ['contest' => $contest]);
    }

    public function edit(Request $request, Contest $contest)
    {
        $this->authorize('admin');

        return view('contests.edit', ['contest' => $contest]);
    }

    public function view(Request $request, $year)
    {
        $contest = Contest::where('year', $year)->firstOrFail();

        return view('contests.view', ['contest' => $contest]);
    }
}
