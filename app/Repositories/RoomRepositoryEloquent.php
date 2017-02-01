<?php

namespace App\Repositories;

use Prettus\Repository\Criteria\RequestCriteria;
use App\Repositories\RoomRepository;
use App\Room;

/**
 * Class RoomRepositoryEloquent
 * @package namespace App\Repositories;
 */
class RoomRepositoryEloquent extends BaseRepository implements RoomRepository
{
    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Room::class;
    }

    /**
     * Boot up the repository, pushing criteria
     */
    public function boot()
    {
        $this->pushCriteria(app(RequestCriteria::class));
    }

    public function addFollowedWithUser($user, $rooms)
    {
        return $rooms->map(function ($room) use($user) {
            $room->followed = $user->followed($room->iid);
        });
    }

    public function byCategories($categories = [], $limit = 6)
    {
        foreach ($categories as $category) {
            $rooms[$category] = $this->where('category', $category)->latest('looker')->limit($limit);
        }

        return $rooms;
    }
}
