<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cocogen_quotation_batch_trans extends Model
{

    protected $table = 'cocogen_quotation_batch_trans';

    protected $fillable = [
        'status',
        'intmNo',
        'inceptDate',
        'expiryDate',
        'assdName',
        'assdAddress',
        'itemDesc',
        'itemDesc2',
        'motorNo',
        'color',
        'modelYear',
        'plateNo',
        'noPass',
        'mvFileNo',
        'carCompany',
        'carVariant',
        'batchId',
        'errorLog',
        'uid',
        'totalamount',
        'aupa',
    ];

    protected $dates = [
        'inceptDate',
        'expiryDate',
        'dueDate',
        'cocIssueDate',
        'created_at',
        'updated_at',
    ];
}
