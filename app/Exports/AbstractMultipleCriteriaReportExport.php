<?php

namespace App\Exports;

abstract class AbstractMultipleCriteriaReportExport extends AbstractReportExport
{
    public function headings(): array
    {
        return [
            [strtoupper($this->getReportTitle())],
            ['', 'Male', 'Female' , 'Total'],
        ];
    }

    public function columnWidths(): array
    {
        return [
            'A' => 30,
            'B' => 15,
            'C' => 15,
            'D' => 15
        ];
    }

    protected function prepare(array $report): array
    {
        $keys = array_keys($report['male']);
        $rows = [];

        $maleSubTotal = 0;
        $femaleSubTotal = 0;
        foreach ($keys as $key) {
            $maleSubTotal += $report['male'][$key];
            $femaleSubTotal += $report['female'][$key];
            $rows[] = [
                ucwords(strtolower($key)),
                (string) $report['male'][$key],
                (string) $report['female'][$key],
                (string) ($report['male'][$key] + $report['female'][$key])
            ];
        }

        $rows[] = [
            'Total',
            (string) $maleSubTotal,
            (string) $femaleSubTotal,
            (string) ($femaleSubTotal + $maleSubTotal)
        ];

        return $rows;
    }
}
