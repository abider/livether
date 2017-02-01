<?php

namespace App\Repositories;

use App\User;
use Prettus\Repository\Criteria\RequestCriteria;

/**
 * Class UserRepositoryEloquent
 * @package namespace App\Repositories;
 */
class UserRepositoryEloquent extends BaseRepository implements UserRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return User::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    /**
     * 获取Api状态下当前登录的用户模型
     *
     * @return \App\User
     */
    public function apiAuth()
    {
        return auth()->guard('api')->user();
    }

    /**
     * 检查Api模式下用户是否登录
     *
     * @return bool
     */
    public function isApiAuth()
    {
        return auth()->guard('api')->check();
    }

    /**
     * 匹配请求中的用户与登录中的用户
     * ( 用户未登录时无法进行匹配直接返回false )
     * param = true ：请求中的用户与当前登录用户是否为同一用户
     * param = false: 仅检查是否登录
     *
     * @param bool $hasUser
     * @return bool
     */
    public function checkUserIsAuth($hasUser = false)
    {
        $result = $this->isApiAuth();

        if ($hasUser && $result) {
            $user = $this->find(request('user'));
            $result = $this->apiAuth()->id === $user->id;
        }

        return $result;
    }
}
