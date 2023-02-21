<?php

namespace Database\Seeders;

use App\Models\Ref_Jurusan;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use Illuminate\Support\Facades\DB;

class JurusanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // for ($i = 0; $i < 1; $i++) {
        $data = Ref_Jurusan::orderBy('jurusan_id', 'ASC')->limit(10)->get();
        $i = 1;
        foreach ($data as $item) {
            DB::table('jurusan')->insert([
                'ref_jurusan_id' => $item->jurusan_id,
                'ref_nama_jurusan' => $item->nama_jurusan,
                'lembaga_id' => $i++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        // }
    }
}
