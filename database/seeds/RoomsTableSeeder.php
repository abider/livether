<?php

use Illuminate\Database\Seeder;
use App\Handle\DefaultHandle;

class RoomsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $items = app(DefaultHandle::class)->handle();
        \DB::table('rooms')->delete();
        \DB::table('rooms')->insert($items);
    }
}
