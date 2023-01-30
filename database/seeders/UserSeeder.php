<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Faker\Factory as Faker;
use App\Models\User;
use App\Models\Country;
use App\Models\District;
use App\Models\UserAddress;






class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        // $address = UserAddress::whereIn('id', [1,2,4,5,6,7,8,9])->update([
        //     'user_id' => $faker->numberBetween($min=1, $max=9)
        // ]);

        for ($i=0; $i < 9; $i++) { 

            // $user = new User;
            // $user->user_address_id = $faker->numberBetween($min = 1, $max = 10);
            // $user->name = $faker->name($gender = null);
            // $user->email = $faker->email;
            // $user->password = Hash::make($faker->password);
            // $user->save();

            /*Contry add*/
            // $country = new Country;
            // $country->name = $faker->country;
            // $country->save();

            /*Distric add*/
            // $district = new District;
            // $district->country_id = $faker->numberBetween($min = 1, $max = 9);
            // $district->name = $faker->state;
            // $district->save();



            /*UserAddress add*/
            // $address = new UserAddress;
            // $address->user_id = $faker->numberBetween($min = 1, $max = 9);
            // $address->strict_address = $faker->streetName;
            // $address->district_id = $faker->numberBetween($min = 1, $max = 9);
            // $address->country_id = $faker->numberBetween($min = 1, $max = 9);
            // $address->save();

            //UserAddress::query()->update(['user_id' => $faker->numberBetween($min=1, $max=9)]);
        }

        /*Update each row */ 
        // $rows = UserAddress::all();
        // foreach ($rows as $row) {
        //     $row->user_id = $faker->numberBetween($min=1, $max=9);
        //     $row->save();
        // }
    }
}
