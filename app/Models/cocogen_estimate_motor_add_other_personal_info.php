<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_estimate_motor_add_other_personal_info extends Model
{
     protected $table = 'cocogen_estimate_motor_add_other_personal_info';
     protected $fillable = [
        'id',
        'gender',
        'placeOfBirth',
        'birthDate',
        'civilStatus',
        'nationality',
        'occupation',
        'telNo',
        'typeOfId',
        'idNo',
        'idNum',
        'gid',
        'action'
        // Add more attributes here if needed
    ];

}
