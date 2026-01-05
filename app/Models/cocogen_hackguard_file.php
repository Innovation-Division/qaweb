<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_hackguard_file extends Model
{
    protected $table = 'cocogen_hackguard_file';
    protected $fillable = [
        'tnxid',
        'fileLocation',
        'filename',
        'updated_at',
        'created_at'

    ];
}