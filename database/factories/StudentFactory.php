<?php

namespace Database\Factories;

use App\Models\Student;
use Illuminate\Database\Eloquent\Factories\Factory;

class StudentFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Student::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $sekolahList = [
            'SMK Negeri 3 Yogyakarta',
            'SMK Negeri 2 Yogyakarta',
            'SMA Negeri 5 Yogyakarta',
            'SMA Negeri 1 Sleman',
            'SMA Negeri 2 Yogyakarta',
        ];

        return [
            'nama' => $this->faker->name,
            'ttl' => $this->faker->date,
            'sekolah' => $this->faker->randomElement($sekolahList),
            'keterangan' => $this->faker->randomElement(['LULUS', 'TIDAK LULUS']),
        ];
    }
}
