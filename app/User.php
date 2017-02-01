<?php

namespace App;

use Image;
use Illuminate\Support\Facades\Input;
use Illuminate\Notifications\Notifiable;
use Prettus\Repository\Contracts\Transformable;
use Prettus\Repository\Traits\TransformableTrait;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements Transformable
{
    use Notifiable,TransformableTrait;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'api_token',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function follows()
    {
        return $this->belongsToMany(Room::class)->withTimestamps();
    }

    public function followThis($room)
    {
        return $this->follows()->toggle($room);
    }

    public function followed($room)
    {
        return !! $this->follows()->where('room_id', $room)->count();
    }

    public static function checkThis($token)
    {
        return !! static::where('api_token', $token)->count();
    }

    public function editAvatar()
    {
        $path = 'images/avatars/'.md5($this->email).'.png';
        Image::make(Input::file('avatar'))->resize(200, 200)->save($path);
        $this->avatar = '/'.$path;
        $this->save();
    }
}
