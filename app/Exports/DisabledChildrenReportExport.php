<?php

namespace App\Exports;

class DisabledChildrenReportExport extends AbstractReportExport
{
    public const REPORT_TYPE = 'diffrently_abled_children';
    public function title(): string
    {
        return 'Differently-abled Children';
    }

    public function array(): array
    {
        return $this->prepare($this->reportGeneratorService->getTotalEmployeesWithDisabledChildrenByGender());
    }

    public function getReportTitle(): string
    {
        return 'No. of employees with differently-abled children per gender as of '.date('F d, Y');
    }
}
