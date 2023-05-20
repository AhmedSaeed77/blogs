<?php

namespace App\Repository;


interface ExcelRepositoryInterface
{
    public function showform();
    
    public function importExcel2($request);   
}