<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as Faker;
use DB;
use Hash;
use Carbon\Carbon;
use Laravolt\Avatar\Facade as Avatar;

class UserSeeder extends Seeder
{
    const USERS_NUMBER = 1000;

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i=1; $i <= static::USERS_NUMBER; $i++) {
            $faker = Faker::create('App\user');
            $faker->addProvider(new \Bezhanov\Faker\Provider\Avatar($faker));

            DB::table('users')->insert([
                'name' => $faker->name,
                'email' => $faker->email,
                'password' => Hash::make('Aa123456@'),
                'avatar' => $faker->avatar($faker->randomNumber(), '300x300', 'jpg', 'set2', 'bg2'),
                'level' => $faker->randomElement([0, 1, 2]),
                'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            ]);
        }
    }
}