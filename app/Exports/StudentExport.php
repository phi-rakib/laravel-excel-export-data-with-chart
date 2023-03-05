<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class StudentExport implements WithMultipleSheets
{
    use Exportable;
    
    public function sheets(): array
    {
        $sheets = [];

        $sheets[] = new StudentGroupByClass();
        $sheets[] = new StudentGroupByClassPieChart();

        return $sheets;
    }
}
