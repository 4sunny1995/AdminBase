<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\Hash;

class DataUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('vi_VN');
        $limit = 35;
        foreach (range(1,$limit) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->email,
                'username' => $faker->username,
                'password' => Hash::make('123123'),
            ]);
        }
    }
}
