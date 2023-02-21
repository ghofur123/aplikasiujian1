<?php

namespace App\Imports;

use App\Models\Guru;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithStartRow;

class GuruImport implements ToModel, WithStartRow
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
        return new Guru([
            'nik' => $row[1],
            'nama' => $row[2],
            'jkl' => $row[3],
            'agama' => $row[4],
            'tlp' => $row[5],
            'lembaga_id' => $row[6],
        ]);
    }
}
