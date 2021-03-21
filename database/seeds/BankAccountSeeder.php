<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1, 10) as $index) {
            DB::table('bank_accounts')->insert([
                'bank_id' => rand(1, 5),
                'account_type' => Str::random(6),
                'account_holder' => $faker->name,
                'current_balance' => '1000.00',
            ]);
        }
    }
}
