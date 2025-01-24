<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class cocogen_bonds_financial_years extends Model
{
    //  protected $table = 'cocogen_bonds_financial_years';
    protected $fillable = [
        'assets',
        // Add other fields that are fillable here
        'assets_previous',
        'gross_income',
        'gross_income_previous',
        'liabilities',
        'liabilities_previous',
        'net_income',
        'net_income_previous',
        'networth',
        'networth_previous',
        'paid_up_capital',
        'paid_up_capital_previous',
        'retained',
        'retained_previous',
        'financial_label',
        'financial_label2',
        'username',
        'trans_id'
    ];

}
