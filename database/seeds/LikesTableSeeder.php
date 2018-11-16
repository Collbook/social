<?php

use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Like::create([
            'reply_id' => 1,
            'user_id' => 1,
        ]);

        App\Like::create([
            'reply_id' => 1,
            'user_id' => 2,
        ]);

        App\Like::create([
            'reply_id' => 1,
            'user_id' => 3,
        ]);

        App\Like::create([
            'reply_id' => 2,
            'user_id' => 2,
        ]);

        App\Like::create([
            'reply_id' => 1,
            'user_id' => 3,
        ]);
    }
}
