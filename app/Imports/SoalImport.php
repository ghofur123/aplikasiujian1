<?php

namespace App\Imports;

use App\Models\Soal;
use Carbon\Carbon;
use Illuminate\Support\Facades\Crypt;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class SoalImport implements ToModel, WithStartRow
{
    public function startRow(): int
    {
        return 2;
    }
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Soal([
            'soal' => $row[1],
            'a' => $row[2],
            'b' => $row[3],
            'c' => $row[4],
            'd' => $row[5],
            'e' => $row[6],
            'jawaban' => strtolower($row[7]),
            'pembahasan' => $row[8],
            'bank_soal_pilihan_id' => session('bank_soal_pilihan_id'),
        ]);
    }
}
