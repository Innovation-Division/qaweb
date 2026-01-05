<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_hackguard_trans extends Model
{
    protected $table = 'cocogen_hackguard_trans';

    protected $primaryKey = 'hackguardID';

    public $timestamps = true;

    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $fillable = [
        'transactionID',
        'status',
'sum_insured', 
        'firstName',
        'lastName',
        'middleName',
        'suffix',
        'contactNo',
        'emailAddress',
        'birthDate',
        'gender',
        'country',
        'region',
        'province',
        'city',
        'barangay',
        'houseNo',
        'street',
        'zip',
        'vat',
        'dst',
        'lgt',
        'promo_less',
        'package',
        'premium_type',
        'premium_details',
        'total_premium_amount',
        'promoCode',
        'promoRate',
        'IDtype',
        'IDno',
        'agent_name'
    ];
}
