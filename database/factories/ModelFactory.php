<?php

    /** @var \Illuminate\Database\Eloquent\Factory $factory */

    $factory->define(User::class, function (Faker $faker) {
        return [
          'name' => $faker->name,
          'email' => $faker->unique()->safeEmail,
          'email_verified_at' => now(),
          'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            // password
          'remember_token' => Str::random(10),
        ];
    });

    $factory->define(App\Product::class, function (Faker\Generator $faker) {

        return [
          'name' => $faker->sentence(3),
          'image' => 'uploads/products/Galaxy-S20.jpg',
          'description' => $faker->paragraph(4),
          'price' => $faker->numberBetween(100, 10000),
        ];
    });
