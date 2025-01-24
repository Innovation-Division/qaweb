<?php

namespace App\Models;
use App\Models\cocogen_estimate_motor_personal_info;
use Illuminate\Database\Eloquent\Model;

class cocogen_estimate_motor_personal_info extends Model
{
    protected $fillable = [
        'firstName',
        'lastName',
        'middleName',
        'contactNo',
        'emailAddress',
        'residenceAddress',
        'residence_province',
        'residence_municipality',
        'residence_barangay',
        'copyMailing',
        'mailing_address',
        'mailing_province',
        'mailing_municipality',
        'mailing_barangay',
        'userLogin',
        'sourceOfFund',
        'agent',
        'agentId',
        'productName',
        'saveCondition'
    ];

    protected $table = 'cocogen_estimate_motor_personal_info';
    protected $primaryKey = "id"; // default it look for id
    public $timestamps = true;
}
