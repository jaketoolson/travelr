<?php
/**
 * Copyright (c) 2018. Jake Toolson
 */

namespace Orion\Travelr\Http\Controllers\Web;

use Illuminate\View\View;
use Orion\Travelr\Http\Controllers\Controller;
use Orion\Travelr\Repositories\PlanetInterface;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(PlanetInterface $repo): View
    {
        return view('home');
    }
}
