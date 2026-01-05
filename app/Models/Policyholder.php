<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Policyholder extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = [
        'name','accountType', 'type','status','firstName', 'middleName', 'lastName', 'dateOfBirth', 'placeOfBirth', 'sex', 'citizenship', 'contactNumber', 'email', 
        'policyOne', 'policyTwo', 'policyThree', 'AutoExcelPlus', 'InternationalTravelPlus', 'DomesticTravelPlus', 'ProTech', 
        'CondoExcelPlus', 'branch', 'contactEmail', 'contactSMS', 'contactMessenger', 'contactCall', 'unitNo', 'street', 
        'barangay', 'city', 'province', 'region', 'zip', 'payment', 'bankWallet',
    ];

    public function uploads()
    {
        return $this->hasMany(UserUpload::class,'policyholder_id');
    }
}
