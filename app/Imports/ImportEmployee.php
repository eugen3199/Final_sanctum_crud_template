<?php

namespace App\Imports;

use App\Models\Employees;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithBatchInserts;
use Maatwebsite\Excel\Concerns\WithChunkReading;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Illuminate\Support\Facades\Log;

class ImportEmployee implements ToModel, WithHeadingRow
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
        $data = '1234567890ABCDEFGHIJKLMNOPQRSTUVWXYZabcefghijklmnopqrstuvwxyz';
        $empKey = substr(str_shuffle($data), 0, 30);
        // $message = var_dump($row);
        // Log::debug($message);

        $empqr = $row['card_id'].'_'.time();
        $response = Employees::on($this->client)->updateOrCreate(
            [
                'empCardID' => $row['card_id']
            ], 
            [
                'empName' => $row['name'],
                'empCampusID' => $row['campus'],
                'empDeptID' => $row['department'],
                'empPosID' => $row['position'],
                'empJoinDate' => $row['join_date'],
                'empNRC' => $row['nrc'],
                'empPhone' => $row['phone_no'],
                'empEmgcPerson' => $row['emergency_contact_person'],
                'empEmgcPhone' => $row['emergency_contact_no'],
                'empKey' => $empKey,
                'empStatus' => 1,
                'empQR' => $empqr,
                'empProfileImg' => 'None'
            ]
        );

        $qrurl = 'https://'.$this->domain.'/public/employee/'.$row['card_id'].'?empKey='.$empKey;
        QrCode::size(200)->format('png')->generate($qrurl, public_path('/employees/qrcodes/').$empqr);

        return $response;
    }
}
