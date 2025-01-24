<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_estimate_accesories extends Model
{
     protected $table = 'cocogen_estimate_accesories';
     protected $fillable = ['gid', 'accessories', 'amount'];
}
