<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_agent_bonds_user extends Model
{
     protected $table = 'cocogen_agent_bonds_user';
     protected $fillable = [
        'code',
        'agentname'
        // other fillable attributes
    ];

}
