<?php

namespace App\Exports;

class DisabledReportExport extends AbstractReportExport
{
    public const REPORT_TYPE = 'differently_abled';
    public function title(): string
    {
        return 'Differently-abled';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalDisabledEmployeesByGender());
    }

    public function getReportTitle(): string
    {
        return 'No. of differently-abled employees per gender as of '.date('F d, Y');
    }
}
