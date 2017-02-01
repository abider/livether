<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RoomRepositoryEloquent;
use App\Repositories\UserRepositoryEloquent;

class RoomsController extends Controller
{
    protected $room;
    protected $user;

    public function __construct
    (
        RoomRepositoryEloquent $room,
        UserRepositoryEloquent $user
    )
    {
        $this->room = $room;
        $this->user = $user;
    }

    public function index()
    {
        $rooms = $this->room->latest('looker')->paginate();

        if ($this->user->isApiAuth()) {
            $this->room->addFollowedWithUser($this->user->apiAuth(), $rooms);
        }

        return $this->success(null, $rooms);
    }

    public function followed()
    {
        $followed = $this->user->apiAuth()->followed(request('room'));

        return $this->apiResponse($followed);
    }

    public function follow()
    {
        $followed = $this->user->apiAuth()->followThis(request('room'));

        return $this->apiResponse(! count($followed['detached']) > 0);
    }
}
