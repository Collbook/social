<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $channel1 = ['title' => 'Laravel Lumen' ,'slug'=>str_slug('Laravel Lumen')];
        $channel2 = ['title' => 'Vue JS','slug'=>str_slug('Vue JS')];
        $channel3 = ['title' => 'Reactjs','slug'=>str_slug('Reactjs')];
        $channel4 = ['title' => 'Css3','slug'=>str_slug('Css3')];
        $channel5 = ['title' => 'Zend Fw','slug'=>str_slug('Zend Fw')];
        $channel6 = ['title' => 'Symfony','slug'=>str_slug('Symfony')];
        $channel7 = ['title' => 'Lumen','slug'=>str_slug('Lumen')];
        $channel8 = ['title' => 'Forget','slug'=>str_slug('Forget')];
        $channel9 = ['title' => 'Laravel Nova','slug'=>str_slug('Laravel Nova')];
        $channel10 = ['title' => 'React Native','slug'=>str_slug('React Native')];

        Channel::create($channel1);
        Channel::create($channel2);
        Channel::create($channel3);
        Channel::create($channel4);
        Channel::create($channel5);
        Channel::create($channel6);
        Channel::create($channel7);
        Channel::create($channel8);
        Channel::create($channel9);
        Channel::create($channel10);
    }
}
