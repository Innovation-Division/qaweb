<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_set_agent_code extends Model
{
     protected $table = 'cocogen_set_agent_code';
     protected $fillable = [
          'ownerId', // assuming ownerId should also be fillable
          'agentName',
          'agentCode'
     ];
}
