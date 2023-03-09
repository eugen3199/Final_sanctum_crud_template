<?php

namespace App\Imports;

use App\Models\Employees;
use Maatwebsite\Excel\Concerns\ToModel;

class ImportEmployee implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row, $client)
    {
        $empqr = $row[0].'_'.time();
        $response = Employees::on($client)->create([
            'empCardID' => $row[0],
            'empName' => $row[1],
            'empCampusID' => $row[9],
            'empDeptID' => $row[3],
            'empPosID' => $row[2],
            'empJoinDate' => $row[4],
            'empNRC' => $row[5],
            'empPhone' => $row[6],
            'empEmgcPerson' => $row[7],
            'empEmgcPhone' => $row[8],
            'empKey' => '123456',
            'empStatus' => 1,
            'empQR' => $empqr,
            'empProfileImg' => 'None'
            'client'=>$client,
        ]);

        return $response;
    }
}
