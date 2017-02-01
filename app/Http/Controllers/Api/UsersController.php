<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RoomRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;

class UsersController extends Controller
{
    protected $user;
    protected $room;

    public function __construct(
        UserRepositoryEloquent $user,
        RoomRepositoryEloquent $room
    )
    {
        $this->user = $user;
        $this->room = $room;
    }

    public function check()
    {
        $checked = $this->user->checkUserIsAuth(request()->has('user'));

        return $this->apiResponse($checked);
    }

    public function following($id)
    {
        $user = $this->user->find($id);
        $rooms = $user->follows()->paginate(15);

        if ($this->user->isApiAuth()) {
            $this->room->addFollowedWithUser($this->user->apiAuth(), $rooms);
        }

        return $this->success(null, $rooms);
    }

    public function show($id)
    {
        $user = $this->user->find($id);
        $user->following_count = $user->follows()->count();
        $user->created = $user->created_at->diffForHumans();

        return $this->success(null, $user);
    }

    public function avatar()
    {
        if (request()->hasFile('avatar')) {
            $this->user->apiAuth()->editAvatar();

            return $this->success('头像修改成功');
        }

        return $this->error('请选择图片！');
    }
}
