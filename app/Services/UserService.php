<?php
namespace App\Services;

use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\UserRepository;

class UserService
{
    protected $userRepository;


    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function signup($request)
    {
        return $this->userRepository->create($request);
    }
}
