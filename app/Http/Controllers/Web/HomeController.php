<?php

namespace Orion\Travelr\Http\Controllers\Web;

use Illuminate\View\View;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): View
    {
        return view('home');
    }
}