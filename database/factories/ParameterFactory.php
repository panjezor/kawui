<?php

namespace Database\Factories;

use App\Models\Parameter;
use Illuminate\Database\Eloquent\Factories\Factory;

class ParameterFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Parameter::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $acceptsValues = $this->faker->boolean;
        return [
            'param' => $this->faker->word,
            'description' => $this->faker->text(),
//            'program_id' => Program::factory()->make()->id,
            'accepts_values' => $acceptsValues,
            'tip_for_values' => $acceptsValues ? $this->faker->text() : null,
        ];
    }
}
