<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class KelasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('kelas')->insert([
                'nama_kelas' => 'kelas ' . ($i + 1),
                'jurusan_id' => $i + 1,
                'wali_kelas_id' => $i + 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
