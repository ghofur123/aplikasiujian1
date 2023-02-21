<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TingkatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            if ($i < 6) {
                DB::table('tingkat')->insert([
                    'tingkat_lembaga' => 'sd',
                    'limit_pilihan' => 'c',
                    'lembaga_id' => $i + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else if ($i >= 6 && $i < 9) {
                DB::table('tingkat')->insert([
                    'tingkat_lembaga' => 'smp',
                    'limit_pilihan' => 'd',
                    'lembaga_id' => $i + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            } else if ($i > 9) {
                DB::table('tingkat')->insert([
                    'tingkat_lembaga' => 'sma',
                    'limit_pilihan' => 'e',
                    'lembaga_id' => $i + 1,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }
    }
}
