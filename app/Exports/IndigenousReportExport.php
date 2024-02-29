<?php

namespace App\Exports;

class IndigenousReportExport extends AbstractReportExport
{
    public const REPORT_TYPE = 'ip_groups';
    public function title(): string
    {
        return 'IP Groups';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalIndigenousEmployeesByGender());
    }

    public function getReportTitle(): string
    {
        return 'No. of employees from IP groups per gender as of '.date('F d, Y');
    }
}
