<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\WithMultipleSheets;

class MutipleSheetExport implements WithMultipleSheets
{
    /**
     * @var ReportExportInterface[]
     */
    private array $reports = [];

    public function sheets(): array
    {
        return $this->reports;
    }

    /**
     * @param ReportExportInterface[] $reports
     * @return void
     */
    public function setReports(array $reports): void
    {
        $this->reports = $reports;
    }

    public function addReport(ReportExportInterface $report): MutipleSheetExport
    {
        $this->reports[] = $report;

        return $this;
    }
}
