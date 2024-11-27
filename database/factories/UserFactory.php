<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'uuid' => Str::uuid(),
            'name' => $this->faker->name(),
            'username' => $this->faker->userName(),
            'password' => Hash::make("admin"),
            'no_telp' => $this->faker->phoneNumber(),
            'image_url' => $this->faker->randomElement([
                'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436188.jpg?w=740&t=st=1684175446~exp=1684176046~hmac=6d6b0ede14b216a5118bfa859bb16e4d0e5e8e525de2ea2c47d0f2d9f07595cb',
                'https://img.freepik.com/free-psd/3d-illustration-person_23-2149436192.jpg?w=740&t=st=1684175536~exp=1684176136~hmac=20c7fb66df7dc984b7130294992647115cc801f886abf653dcb066bfa9eb1fa8',
                'https://img.freepik.com/free-psd/3d-illustration-person-with-sunglasses_23-2149436178.jpg?w=740&t=st=1684175548~exp=1684176148~hmac=f02f46a42b1fbe47bd0465d1ddd90510cf1b9f58f821947ae39e54e857e5b45d',
                'https://img.freepik.com/free-psd/3d-illustration-person-with-glasses_23-2149436189.jpg?w=740&t=st=1684175577~exp=1684176177~hmac=c3919e13c9c122a17792386add5e92334c2d099def81db1f64d0b9c2581684fe',
                'https://img.freepik.com/free-psd/3d-illustration-person-with-glasses_23-2149436185.jpg?w=740&t=st=1684175599~exp=1684176199~hmac=7359e58c79ae3a2625f44ac315e87f0fe50d6c048061b299616de4f338612cb0',
                'https://img.freepik.com/free-psd/3d-illustration-business-man-with-glasses_23-2149436194.jpg?w=740&t=st=1684175618~exp=1684176218~hmac=08275cda00decda6e5eaa24e1d74aeaddf50ef9c7278c5b1dff177fb6afa0f15',
                'https://img.freepik.com/free-psd/3d-illustration-bald-person_23-2149436183.jpg?w=740&t=st=1684175640~exp=1684176240~hmac=efc12604a713b2d7ab24d96562c6e37d748a2cfc2d60d84d83ffca22120199e7',
                'https://img.freepik.com/free-psd/3d-illustration-person-with-long-hair_23-2149436197.jpg?w=740&t=st=1684175664~exp=1684176264~hmac=ac06b3d21357dbea80c166694688fb52f11e5ec5d4ab729787b9a8d331f3d842'

            ]),
            'ttl' => $this->faker->dateTime(),
            'gender' => $this->faker->randomElement(['perempuan', 'laki-laki']),
            'unit' => $this->faker->randomElement(['palembang', 'jakarta']),
            'tmt' => $this->faker->dateTime(),
            'penempatan' => $this->faker->randomElement(['palembang', 'jakarta']),
            'role' => $this->faker->randomElement(['admin', 'user']),
            'remember_token' => Str::random(10),
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(fn (array $attributes) => [
            'email_verified_at' => null,
        ]);
    }
}
