<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_estimate_motor_info extends Model
{
     protected $table = 'cocogen_estimate_motor_info';
     protected $fillable = [
        "gid","year","brand","model","valueOfVehicle","bodyInjury","propertyDamage","bodyType","renewal","perSeat","autoPersonalAccident","promoCode","ownDamage","ownDamageCompute","actsOfNature","actOfNatureCompute","vtplBodyInjury","vtplPropertyDamage","grossPrem","originalValueOfVehicle","totalAccessory","personal_id","created_at","updated_at"
    ];
}
