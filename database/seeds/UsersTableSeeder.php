<?php

use Illuminate\Database\Seeder;
use Prophecy\Doubler\NameGenerator;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class,10)->create();
    }
}
