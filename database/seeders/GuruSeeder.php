<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class GuruSeeder extends Seeder
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
            DB::table('guru')->insert([
                'nik' => '350930100689000' . $i,
                'nama' => $faker->name(),
                'jkl' => 'laki-laki',
                'agama' => 'islam',
                'tlp' => $faker->phoneNumber(),
                'lembaga_id' => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
