<?php
namespace App\Repositories;

use App\Models\User;

class UserRepository
{
    public function create($request)
    {
        return User::create([
            'name' => $request['name'],
            'email' => $request['email'],
            'phone' => $request['phone'],
            'password' => $request['password'],
        ]);
    }
}
