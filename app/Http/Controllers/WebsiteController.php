<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contest;

class WebsiteController extends Controller
{
    public function home()
    {
        $contest = Contest::where('active', true)->orderBy('year', 'desc')->first();

        return view('website.home', ['contest' => $contest]);
    }
}
