<?php

namespace App\Exports;

class SoloParentsReportExport extends AbstractReportExport
{
    public const REPORT_TYPE = 'solo_parents';
    public function title(): string
    {
        return 'Solo Parents';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalSoloParentEmployeesByGender());
    }

    public function getReportTitle(): string
    {
        return 'No. of employees who are solo parents per gender as of '.date('F d, Y');
    }
}
