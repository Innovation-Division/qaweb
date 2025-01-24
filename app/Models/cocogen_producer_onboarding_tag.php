<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_producer_onboarding_tag extends Model
{
    protected $table = 'cocogen_producer_onboarding_tag';

    public function producers() {
        return $this->belongsTo('App\cocogen_producer_onboarding', 'id');
    }
}
