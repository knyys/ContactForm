<?php

namespace Database\Factories;

use App\Models\Contact;
use Illuminate\Database\Eloquent\Factories\Factory;
use Faker\Factory as FakerFactory;

class ContactFactory extends Factory
{
    protected $model = Contact::class;

    public function definition()
    {
        $faker = FakerFactory::create('ja_JP');
        return [
            'category_id' => $this->faker->numberBetween(1, 5),
            'first_name' => $faker->firstName,
            'last_name' => $faker->lastName,
            'gender' => $this->faker->randomElement([1, 2]),
            'email' => $this->faker->safeEmail,
            'tel' => $this->faker->numerify('080########'),
            'address' => $faker->address,
            'building' => $faker->secondaryAddress,
            'detail' => $faker->randomElement([
                '商品の破損について問い合わせたいです。',
                '交換を希望します。',
                '配送が遅れています。',
                'サイズが合いません。',
                'その他の問い合わせです。',
                ])
        ];
    }
}
