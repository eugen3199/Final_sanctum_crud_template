<?php

namespace App\Imports;

use App\Models\Employees;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class ImportEmployee implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    private $client;
    private $domain;

    public function __construct($client, $domain)
    {
        $this->client = $client;
        $this->domain = $domain;
    }

    public function model(array $row)
    {
        $empqr = $row[0].'_'.time();
        $response = Employees::on($this->client)->create([
            'empCardID' => $row[0],
            'empName' => $row[1],
            'empCampusID' => $row[2],
            'empDeptID' => $row[3],
            'empPosID' => $row[4],
            'empJoinDate' => $row[5],
            'empNRC' => $row[6],
            'empPhone' => $row[7],
            'empEmgcPerson' => $row[8],
            'empEmgcPhone' => $row[9],
            'empKey' => '123456',
            'empStatus' => 1,
            'empQR' => $empqr,
            'empProfileImg' => 'None'
        ]);

        $qrurl = 'https://'.$this->domain.'/public/employee/'.$row[0].'?empKey=123456';
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/employees/qrcodes/').$empqr);

        return $response;
    }
}
