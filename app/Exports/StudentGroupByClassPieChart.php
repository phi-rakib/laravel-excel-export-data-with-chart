<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithCharts;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Chart\Chart;
use PhpOffice\PhpSpreadsheet\Chart\DataSeries;
use PhpOffice\PhpSpreadsheet\Chart\DataSeriesValues;
use PhpOffice\PhpSpreadsheet\Chart\Layout;
use PhpOffice\PhpSpreadsheet\Chart\Legend;
use PhpOffice\PhpSpreadsheet\Chart\PlotArea;
use PhpOffice\PhpSpreadsheet\Chart\Title;

class StudentGroupByClassPieChart implements WithCharts, WithTitle
{
   public function charts()
   {
        $labels = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Students!$A$1:$B$1', null)];

        $categories = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_STRING, 'Students!$A$2:$A$11', null, 10)];

        $values = [new DataSeriesValues(DataSeriesValues::DATASERIES_TYPE_NUMBER, 'Students!$B$2:$B$11', null)];

        $layout = new Layout();
        $layout->setShowVal(true);

        $chart = new Chart(
            'chart',
            new Title('Student Count By Class'),
            new Legend(),
            new PlotArea($layout, [
                    new DataSeries(DataSeries::TYPE_PIECHART, null, range(0, count($values) - 1), 
                    $labels,
                    $categories,
                    $values
                )
            ])
        );

        $chart->setTopLeftPosition('A1');
        $chart->setBottomRightPosition('H20');

        return $chart;
   }

   public function title(): string
   {
        return 'Pie Chart';
   }
}
