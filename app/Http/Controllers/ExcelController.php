<?php

namespace App\Http\Controllers;
use App\Models\ExcelFile;
use App\Imports\ExcelImport;
use Excel;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Repository\ExcelRepositoryInterface;

class ExcelController extends Controller
{
    protected $excel;

    public function __construct(ExcelRepositoryInterface $excel)
    {
        $this->excel = $excel;
    }

    public function showform()
    {
        //$excel = $this->excel->showform();
        return view('excel.show');
    }

    public function importExcel(Request $request)
    {
        $this->excel->importExcel2($request);
        // $request->validate([
        //                         'excel'=> 'required|mimes:xlsx,xls,csv',
        //                     ]);

        // $file = $request->file('excel');
        // if($file)
        // {
        //     $data = Excel::import(new ExcelImport(),$file);
        //     return redirect()->back()->with('success', 'َQuestions is added');
        // }
        // else
        // {
        //     return redirect()->back()->with('error', 'select excel file ');
        // }
    }
}
