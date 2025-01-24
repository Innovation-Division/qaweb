<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_estimate_motor_add_car_info extends Model
{
     protected $table = 'cocogen_estimate_motor_add_car_info';
     protected $fillable = [
        'id',
        'gid',
        'mvFileNo',
        'plateNo',
        'engineNo',
        'color',
        'chasisNo',
        'conductionStickerNo',
        'policyInceptionDate',
        'mortgage',
        'agentAvailable',
        'mortgageValue',
        'checkSave',
        'updated_at',
        'created_at',
    ];


}
