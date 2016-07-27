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
    ];
});


$factory->define(App\Company::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->company,
        'image_url' => $faker->imageUrl($width = 50, $height = 50),
    ];
});


$factory->define(App\Category::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->word,
        'image_url' => $faker->imageUrl($width = 50, $height = 50)
    ];
});

$factory->define(App\ProductPrice::class, function (Faker\Generator $faker) {
    return [
        'price' => $faker->randomFloat($nbMaxDecimals = null, $min = 0, $max = 100000),
        'product_id' => function () {
            return factory(App\Product::class)->create()->id;
        },
    ];
});

$factory->define(App\CartDetail::class, function (Faker\Generator $faker) {
    return [
        'quantity' => $faker->randomNumber($nbDigits = 1)
    ];
});


$factory->define(App\Product::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->words($nb = 3, $asText = true),
        'description' => $faker->paragraph($nbSentences = 3, $variableNbSentences = true),
        'image_url' => $faker->imageUrl($width = 200, $height = 200),
        'company_id' => function () {
            return factory(App\Company::class)->create()->id;
        },
        'category_id' => function () {
            return factory(App\Category::class)->create()->id;
        },
    ];
});

$factory->define(App\UserList::class, function (Faker\Generator $faker) {
    return [
        'user_id' => function () {
            return factory(App\User::class)->create()->id;
        },
    ];
});
