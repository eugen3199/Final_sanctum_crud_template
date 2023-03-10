<?php

namespace App\Exports;

use App\Models\Employees;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithMapping;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportEmployee implements FromCollection, WithMapping, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */

    private $client;

    public function __construct($client)
    {
        $this->client = $client;
    }

    public function headings(): array
    {
        return [
            'Card ID',
            'Name',
            'Campus',
            'Department',
            'Position',
            'Join Date',
            'NRC',
            'Phone_No.',
            'Emergency Contact Person',
            'Emergency Contact No.'
        ];
    }

    public function map($employee): array
    {
        return [
            $employee->empCardID,
            $employee->empName,
            $employee->empCampusID,
            $employee->empDeptID,
            $employee->empPosID,
            $employee->empJoinDate,
            $employee->empNRC,
            $employee->empPhone,
            $employee->empEmgcPerson,
            $employee->empEmgcPhone
        ];
    }

    public function collection()
    {
        return Employees::on($this->client)
                ->orderBy('empCardID')
                ->get();
    }
}
