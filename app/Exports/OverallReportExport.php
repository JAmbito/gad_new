<?php

namespace App\Exports;

class OverallReportExport extends AbstractReportExport
{
    public const REPORT_TYPE = 'overall';
    public function title(): string
    {
        return 'Overall';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalEmployeesByGender());
    }

    public function getReportTitle(): string
    {
        return 'No. of employees per gender as of '.date('F d, Y');
    }
}
