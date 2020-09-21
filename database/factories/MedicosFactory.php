<?php

namespace Database\Factories;

use App\Models\Medico;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class MedicoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Medico::class;
    // protected $model = \App\Models\Medico::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function run()
    {
        return [
            'crm' => 5,
            'nome' => $this->$faker->unique()->word,
            'telefone' => 11912345678,
            'especialidade' => $this->$faker->word,
        ];
    }
}
