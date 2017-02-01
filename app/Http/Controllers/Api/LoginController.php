<?php

namespace App\Http\Controllers\Api;

class LoginController extends Controller
{
    public function login()
    {
        if (auth()->guard('api')->attempt(request(['email', 'password']), request('remember'))) {
            return $this->success('登录成功');
        } else {
            return $this->error('邮箱或密码错误');
        }
    }
}
