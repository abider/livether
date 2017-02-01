<?php

namespace App\Http\Controllers\Api;

use App\Repositories\RoomRepositoryEloquent;

class HomeController extends Controller
{
    protected $room;

    public function __construct(RoomRepositoryEloquent $room)
    {
        $this->room = $room;
    }

    public function index()
    {
        $top = $this->room->latest('looker')->limit(2);
        $roomsByCategories = $this->room->byCategories(['douyu', 'panda', 'quanmin'], 6);
        $rooms = array_merge(compact('top'), $roomsByCategories);

        return $this->success(null, $rooms);
    }
}
