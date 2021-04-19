<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Comments;
use Faker\Generator as Faker;

$factory->define(Comments::class, function (Faker $faker) {
    return [
        'title' => $faker->text(10),
        'content' => $faker->text(200),
        'post_id' => function(){
            return factory(App\Post::class)->create()->id;
        }
    ];
});
