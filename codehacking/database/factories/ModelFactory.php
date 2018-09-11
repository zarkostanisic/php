<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
        'role_id' => $faker->numberBetween(2, 3),
        'image_id' => 1
    ];
});

$factory->define(App\Post::class, function (Faker\Generator $faker) {
    return [
        'title' => $faker->sentence(7, 11),
        'category_id' => $faker->numberBetween(1, 3),
        'body' => $faker->paragraphs(rand(10, 15), true),
        'image_id' => 1,
        'slug' => $faker->slug()
    ];
});

$factory->define(App\Role::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement(['author', 'subcriber']),
    ];
});

$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->unique()->randomElement(['PHP', 'JavaScript', 'Laravel']),
    ];
});

$factory->define(App\Image::class, function (Faker\Generator $faker) {
    return [
        'image' => 'placeholder.jpg',
    ];
});

$factory->define(App\Comment::class, function (Faker\Generator $faker) {
    return [
        'post_id' => $faker->numberBetween(1, 10),
        'is_active' => 1,
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true)
    ];
});

$factory->define(App\CommentReply::class, function (Faker\Generator $faker) {
    return [
        'comment_id' => $faker->numberBetween(1, 10),
        'is_active' => 1,
        'author' => $faker->name,
        'email' => $faker->safeEmail,
        'body' => $faker->paragraphs(1, true)
    ];
});

