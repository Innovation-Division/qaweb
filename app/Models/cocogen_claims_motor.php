<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_claims_motor extends Model
{
    protected $table = 'cocogen_claims_motor';

    protected $fillable = [
        'status',
        'policy_no',
        'product',
        'product_line',
        'damage_type',
        'fullname',
        'address',
        'birthdate',
        'email_address',
        'mobile',
        'plate_no',
        'model',
        'vehicle_type',
        'year',
        'place_of_accident',
        'date_of_accident',
        'fullname_driver',
        'license_no',
        'rel_to_insured',
        'expiry_date',
        'classification',
        'restriction_code',
        'agent_name',
        'agent_mobile',
        'created_at',
        'updated_at',
    ];
}

