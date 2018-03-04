<?php

namespace Orion\Travelr\Http\Controllers\Web;

use Illuminate\View\View;
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
