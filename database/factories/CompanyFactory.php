<?php

namespace Database\Factories;

use App\Models\Company;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->unique()->company(),
            'email' => $this->faker->unique()->companyEmail(),
            'logo' => $this->faker->unique()->imageUrl(200, 200),
            'website' => $this->faker->unique()->domainName()
        ];
    }
}
