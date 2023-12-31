<?php

namespace Database\Factories;
use App\Models\Section;
use App\Models\Appointment;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [

            'name' => $this->faker->randomElement(['عمر خالد','محمد حسن','علي احمد',' حسن حمدان','يوسف خالد','حمزة محمد','علي احمد','محسن حسن','محمد علي','عمو احمد','سليمان احمد','عبدالرحمن خالد','محمد السيد','يوسف علي','احمد حسن','معتز اشرف','سيد حسن','زين حسن']),
            'email' => $this->faker->unique()->safeEmail(),
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
            'phone' => $this->faker->phoneNumber,
            'section_id' => Section::all()->random()->id,
            'appointment_id' => Appointment::all()->random()->id,
        ];
    }
}
