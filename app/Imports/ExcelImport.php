<?php

namespace App\Imports;

use App\Models\ExcelFile;

use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithStartRow;

class ExcelImport implements ToModel,WithStartRow , WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public function startRow(): int
    {
        return 2;
    }

    public function headingRow(): int
    {
        return 1;
    }

    public function model(array $row)
    {   
        if($row['name'])
        {
            $excel = new ExcelFile();
            $excel->name = $row['name'];
            $excel->age = $row['age'];
            $excel->address = $row['address'];
            $excel->save();
        }
    }
}
