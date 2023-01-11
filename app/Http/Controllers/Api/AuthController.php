<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\SignupRequest;
use App\Models\User;
use App\Repositories\UserRepository;
use App\Services\UserService;
use App\Traits\API;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    protected $userService;

    public function __construct()
    {
        $this->userService = new UserService(new UserRepository());
    }

    public function signup(SignupRequest $request)
    {
        $user = $this->userService->signup($request->validated());

        return (new API)
            ->isOk(__('Registration Successful.'))
            ->setData(['user_pin' => $user->pin])
            ->build();
    }

}
