<?php

namespace Orion\Travelr\Http\Controllers\Web\Auth;

use Orion\Travelr\Http\Controllers\Web\Controller;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{
    use ResetsPasswords;

    protected $redirectTo = '/home';

    public function __construct()
    {
        $this->middleware('guest');
    }
}
