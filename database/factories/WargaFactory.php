<?php

namespace Database\Factories;

use Carbon\Carbon;
use Modules\Master\Models\Warga;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Warga>
 */

class WargaFactory extends Factory
{
  /**
   * Define the model's default state.
   *
   * @return array<string, mixed>
   */

  protected $model = Warga::class;

  public function definition() : array
  {
    return [
      'nama' => $this->faker->name(), // Nama khas Indonesia
      'telp' => '+62' . $this->faker->numerify('8##########'), // No telepon khas Indonesia
      'alamat' => $this->faker->address(), // Alamat di Indonesia
      'nik' => $this->faker->numerify('################'), // 16 angka
      'jk' => $this->faker->randomElement(['Laki-laki', 'Perempuan']), // Jenis kelamin
      'kota_kelahiran' => $this->faker->city(), // Kota di Indonesia
      'tgl_lahir' => $this->faker->dateTimeBetween('-34 years', '-19 years')->format('Y-m-d'), // Tahun 1990-2005
      'agama' => $this->faker->numberBetween(1, 4), // 1 - 4
      'pendidikan' => $this->faker->numberBetween(1, 7), // 1 - 7
      'pekerjaan' => $this->faker->numberBetween(1, 20), // 1 - 20
      'status_perkawinan' => $this->faker->numberBetween(1, 4), // 1 - 4
      'status_keluarga' => $this->faker->numberBetween(1, 4), // 1 - 4
      'created_by' => 'admin',
      'updated_by' => 'admin',
      'deleted_by' => null,
      'deleted_at' => null,
      'created_at' => Carbon::now(),
      'updated_at' => Carbon::now(),
    ];
  }
}
