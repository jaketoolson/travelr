<?php

namespace Orion\Travelr\Http\Controllers\Web\Auth;

use Orion\Travelr\User;
use Orion\Travelr\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Contracts\Validation\Factory as ValidatorFactory;

class RegisterController extends Controller
{
    use RegistersUsers;

    protected $redirectTo = '/home';

    /**
     * @var ValidatorFactory
     */
    protected $validatorFactory;

    public function __construct(ValidatorFactory $validator)
    {
        $this->middleware('guest');
        $this->validatorFactory = $validator;
    }

    protected function validator(array $data): Validator
    {
        return $this->validatorFactory->make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    protected function create(array $data): User
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
        ]);
    }
}
