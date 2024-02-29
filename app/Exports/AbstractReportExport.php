<?php

namespace App\Exports;

use App\Services\ReportGeneratorService;
use Maatwebsite\Excel\Concerns\FromArray;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithStyles;
use Maatwebsite\Excel\Concerns\WithTitle;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

abstract class AbstractReportExport implements FromArray, ShouldAutoSize, WithColumnWidths, WithHeadings, WithStyles, WithTitle, ReportExportInterface
{
    protected ReportGeneratorService $reportGeneratorService;

    abstract public function getReportTitle(): string;
    public function __construct(ReportGeneratorService $reportGeneratorService)
    {
        $this->reportGeneratorService = $reportGeneratorService;
    }

    public function headings(): array
    {
        return [
            [strtoupper($this->getReportTitle())],
            ['Male', 'Female', 'Total'],
        ];
    }


    public function columnWidths(): array
    {
        return [
            'A' => 15,
            'B' => 15,
            'C' => 15,
        ];
    }

    protected function prepare(array $report): array
    {
        $report[] = array_sum($report);

        foreach ($report as &$data) {
            $data = (string) $data;
        }

        return [$report];
    }

    public function styles(Worksheet $sheet): array
    {
        return [
            1 => ['font' => ['bold' => true]],
        ];
    }
}
