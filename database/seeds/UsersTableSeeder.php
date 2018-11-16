<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\User::create([
            'name'       => 'admin',
            'password'   => bcrypt('admin'),
            'email'      => 'lnq.fpt@gmail.com',
            'admin'      => 1,
            'avatar'     => 'avatar.png',
        ]);

        App\User::create([
            'name'       => 'author',
            'password'   => bcrypt('author'),
            'email'      => 'lnq.framgia@gmail.com',
            'admin'      => 0,
            'avatar'     => 'avatar.png',
        ]);

        App\User::create([
            'name'       => 'mark',
            'password'   => bcrypt('mark'),
            'email'      => 'mark@gmail.com',
            'admin'      => 0,
            'avatar'     => 'avatar.png',
        ]);

    }
}
