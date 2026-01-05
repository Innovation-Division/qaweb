<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_claims_motor_file extends Model
{
    protected $table = 'cocogen_claims_motor_file';

    protected $fillable = [
        'policy_no',
        'file_type',
        'fileLocation',
        'filename',
        'created_at',
        'updated_at',
    ];
}
