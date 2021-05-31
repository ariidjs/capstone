<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Penerima;
use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(Penerima::class, function (Faker $faker) {
    return [
        'id' =>$faker->id,
        'nama' => $faker->name,
        'alamat' => $faker->alamat,
        'gaji' => $faker->gaji,
        'pekerjaan' => $faker->pekerjaan,
        'tanggungan' => $faker->tanggungan,
        'umur' => $faker->umur,
        'status' => $faker->status
    ];
});
