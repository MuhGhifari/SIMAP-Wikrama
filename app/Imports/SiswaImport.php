<?php

namespace App\Imports;

use App\Siswa;
use Maatwebsite\Excel\Concerns\ToModel;
use Carbon\Carbon;

class SiswaImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Siswa([
            'nisn' => $row[0],
            'nis' => $row[1],
            'nama' => $row[2],
            'jk' => $row[3],
            'agama' => $row[4],
            'rayon_id' => $row[5],
            'rombel_id' => $row[6],
            'telp' => $row[7],
            'alamat' => $row[8],
            'tanggal_lahir' => Carbon::instance(\PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($row[9])),
            'tempat_lahir' => $row[10],
            'asal_sekolah' => $row[11],
        ]);
    }
}
