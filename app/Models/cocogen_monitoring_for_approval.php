<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_monitoring_for_approval extends Model
{
     protected $table = 'cocogen_monitoring_for_approval';
     protected $fillable = [
        'id', 'intermediary', 'intermediaryname', 'remaining_doc', 'used_doc',
        'date_request', 'status', 'reason_for_request', 'request_by',
        'intermediarycount', 'padrange', 'padtype', 'sales_update_date',
        'sales_permit', 'last_approve_request', 'expirydate', 'dateupload',
        'complete', 'created_at', 'updated_at'
    ];


}
