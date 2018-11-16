<?php

use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1 = 'Throwing Error when Registering and Account';
        $t2 = 'Laravel not redirecting me to homepage after axios login';
        $t3 = 'Forge Horizon deployment is not reliable';
        $t4 = 'Vue: Applying css class if condition is met';
        $t5 = 'What is the best host service for a laravel project?';
        $c1 = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore placeat temporibus, dolor atque ab, unde mollitia, accusamus expedita perferendis at non nisi libero neque vitae id? Laudantium hic placeat aliquid.';
        $c2 = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore placeat temporibus, dolor atque ab, unde mollitia, accusamus expedita perferendis at non nisi libero neque vitae id? Laudantium hic placeat aliquid.';
        $c3 = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore placeat temporibus, dolor atque ab, unde mollitia, accusamus expedita perferendis at non nisi libero neque vitae id? Laudantium hic placeat aliquid.';
        $c4 = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore placeat temporibus, dolor atque ab, unde mollitia, accusamus expedita perferendis at non nisi libero neque vitae id? Laudantium hic placeat aliquid.';
        $c5 = 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Inventore placeat temporibus, dolor atque ab, unde mollitia, accusamus expedita perferendis at non nisi libero neque vitae id? Laudantium hic placeat aliquid.';

        $d1 = [
            'title' => $t1,
            'content' => $c1,
            'channel_id' => 1,
            'user_id'    => 1,
            'slug'       => str_slug($t1)
        ];
        $d2 = [
            'title' => $t2,
            'content' => $c2,
            'channel_id' => 2,
            'user_id'    => 2,
            'slug'       => str_slug($t2)
        ];
        $d3 = [
            'title' => $t3,
            'content' => $c3,
            'channel_id' => 3,
            'user_id'    => 1,
            'slug'       => str_slug($t3)
        ];

        $d4 = [
            'title' => $t4,
            'content' => $c4,
            'channel_id' => 1,
            'user_id'    => 1,
            'slug'       => str_slug($t4)
        ];
        $d5 = [
            'title' => $t5,
            'content' => $c5,
            'channel_id' => 2,
            'user_id'    => 2,
            'slug'       => str_slug($t5)
        ];

        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
        Discussion::create($d5);
    }
}
