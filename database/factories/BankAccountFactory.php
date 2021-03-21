<?php

namespace Database\Factories;

use App\Models\BankAccounts as Accounts;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class BankAccountFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Accounts::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'id' => 1,
            'bank_id' => rand(1, 5),
            'account_type' => Str::random(6),
            'account_holder' => $this->faker->name,
            'current_balance' => '1000.00',
        ];
    }
}
