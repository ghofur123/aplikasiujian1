<?php

namespace Database\Seeders;

use App\Models\Ref_mata_pelajaran;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MapelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = Ref_mata_pelajaran::limit(10)->get();
        $no = 1;
        foreach ($data as $item) {
            DB::table('mapel')->insert([
                'mata_pelajaran_id' => $item->mata_pelajaran_id,
                'nama' => $item->nama,
                'kelas_id' => $no++,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }
    }
}
