<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_producer_onboarding extends Model
{
    protected $table = 'cocogen_producer_onboarding';

    protected $primaryKey = 'id';

    public function tags() {
        return $this->hasMany('App\cocogen_producer_onboarding_tag', 'producer_id');
    }
}
