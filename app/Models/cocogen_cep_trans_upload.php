<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cocogen_cep_trans_upload extends Model
{
    use HasFactory;

    protected $table = 'cocogen_cep_trans_upload';

    protected $fillable = [
        'trans_ID',
        'name',
        'path',
    ];

    public function transaction()
    {
        return $this->belongsTo(CocogenCepTrans::class, 'trans_ID', 'id');
    }
}
