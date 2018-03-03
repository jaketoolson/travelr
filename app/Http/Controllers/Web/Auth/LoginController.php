<?php

namespace Orion\Travelr\Http\Controllers\Web\Auth;

use Orion\Travelr\Http\Controllers\Web\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller
{
    use AuthenticatesUsers;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
