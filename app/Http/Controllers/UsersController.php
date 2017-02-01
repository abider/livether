<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryEloquent;

class UsersController extends Controller
{
    protected $user;

    public function __construct(UserRepositoryEloquent $user)
    {
        $this->user = $user;
    }

    public function show($id)
    {
        $user = $this->user->find($id);

        return view('users.show', compact('user'));
    }
}
