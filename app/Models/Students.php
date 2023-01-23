<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Students extends Model
{
    use HasFactory;

    protected $fillable = [
        'studCardID',
        'studName',
        'studClassID',
        'studBatchID',
        'studGuardName',
        'studDoB',
        'studEmgcPhone1',
        'studEmgcPhone2',
        'SchoolEmgcCall'
    ];
}
