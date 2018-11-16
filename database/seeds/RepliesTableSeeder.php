<?php

use App\Reply;
use Illuminate\Database\Seeder;

class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1 = [
            'user_id' => 1,
            'discussion_id' => 1,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        $r2 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        $r3 = [
            'user_id' => 2,
            'discussion_id' => 3,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        $r4 = [
            'user_id' => 2,
            'discussion_id' => 4,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        $r5 = [
            'user_id' => 3,
            'discussion_id' => 5,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];
        $r6 = [
            'user_id' => 3,
            'discussion_id' => 1,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        $r7 = [
            'user_id' => 1,
            'discussion_id' => 2,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        $r8 = [
            'user_id' => 1,
            'discussion_id' => 3,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];
        $r9 = [
            'user_id' => 2,
            'discussion_id' => 4,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];
        $r10 = [
            'user_id' => 2,
            'discussion_id' => 5,
            'content'       => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ratione quae asperiores, corporis dolorem voluptatum a qui necessitatibus porro, velit laudantium reiciendis nisi quia delectus soluta nemo tenetur. Consequatur, non tenetur.',
        ];

        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
        Reply::create($r5);
        Reply::create($r6);
        Reply::create($r7);
        Reply::create($r8);
        Reply::create($r9);
        Reply::create($r10);
    }
}
