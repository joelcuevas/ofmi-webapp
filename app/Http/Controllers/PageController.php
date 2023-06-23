<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Page;

class PageController extends Controller
{
    public function index(Request $request)
    {
        $this->authorize('admin');

        $pages = Page::orderBy('slug');

        if ($request->has('q')) {
            $q = '%'.$request->q.'%';
            $pages->where('title', 'like', $q)
                ->orWhere('slug', 'like', $q);
        }

        return view('pages.index', [
            'pages' => $pages->paginate(50),
        ]);
    }

    public function edit(Request $request, Page $page)
    {
        $this->authorize('admin');

        return view('pages.edit', ['page' => $page]);
    }

    public function show(Request $request, Page $page)
    {
        $this->authorize('admin');

        return view('pages.show', ['page' => $page]);
    }

    public function view(Request $request, $slug)
    {
        $page = Page::where('slug', $slug)->firstOrFail();

        return view('pages.view', ['page' => $page]);
    }
}
