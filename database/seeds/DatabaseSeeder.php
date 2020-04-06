<?php

use App\Question;
use App\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);
        factory(User::class,5)
            ->create()
            ->each(function($user){
                for($i=1;$i<= rand(5,10);$i++){
                    $user->questions()->create(factory(Question::class)->make()->toArray());
                }
            });
    }
}
