<?php

namespace Orion\Travelr\Http\Controllers;

use Illuminate\Http\Response;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(): Response
    {
        return view('home');
    }
}
