<?php

namespace App\Repository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Imports\ExcelImport;
use Excel;

class ExcelRepository implements ExcelRepositoryInterface
{

    public function showform()
    {
        return view('excel.show');
    }   

    public function importExcel2($request)
    {
        //return "asd";
        $request->validate([
                                'excel'=> 'required|mimes:xlsx,xls,csv',
                            ]);

        $file = $request->file('excel');
        if($file)
        {
            $data = Excel::import(new ExcelImport(),$file);
            return redirect()->back()->with('success', 'َData is added');
        }
        else
        {
            return redirect()->back()->with('error', 'select excel file ');
        }
    }
    
}
