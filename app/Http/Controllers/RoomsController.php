<?php

namespace App\Http\Controllers;

use App\Repositories\RoomRepositoryEloquent;

class RoomsController extends Controller
{
    protected $room;

    public function __construct(RoomRepositoryEloquent $room)
    {
        $this->room = $room;
    }

    public function index()
    {
        return view('rooms');
    }

    public function show($id)
    {
        $room = $this->room->find($id);

        return view('show', compact('room'));
    }
}
