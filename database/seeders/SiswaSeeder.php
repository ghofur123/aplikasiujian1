<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class SiswaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('siswa')->insert([
                'nisn' => $faker->randomNumber(),
                'nik' => $faker->numberBetween(),
                'nama' => $faker->name(),
                'kelas_id' => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
