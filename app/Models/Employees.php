<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    use HasFactory;

    protected $fillable = [
        'empCardID',
        'empName',
        'empPosID',
        'empDeptID',
        'empJoinDate',
        'empNRC',
        'empPhone',
        'empEmgcPerson',
        'empEmgcPhone',
        'empCampusID'
    ];
}
