<?php
/**
 * Copyright (c) Jake Toolson 2018.
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
        dd($repo->getById(1));
        return view('home');
    }
}
