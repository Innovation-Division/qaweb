<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class cocogen_cep_trans extends Model
{
    use HasFactory;

     protected $table = 'cocogen_cep_trans';

    protected $fillable = [
        'trans_id',
        'region', 'province', 'city', 'barangay', 'street', 'zip',
        'has_Agent', 'building_name', 'unit_type_name', 'unit_number', 'front', 'left_side',
        'right_side', 'rear', 'add_specs', 'agent_name', 'roof_name', 'wall_name',
        'storey', 'has_mortgage', 'mortgagee_name', 'bank', 'branch',
        'covered_amount', 'declared_value',
        'optional_benefits', 'extension_covers',
        'first_name', 'last_name', 'suffix', 'mobile', 'email', 'birth_date',
        'place_of_birth', 'country_of_birth', 'citizenship', 'id_type', 'id_number', 'emergency_full_name', 'emergency_mobile', 'emergency_relationship',
        'has_incurred_losses', 'declared_incurred_losses', 'description_losses',
         'perils_amount', 'gross_premium', 'total_premium_amount','vat', 'dst', 'lgt', 'fire_tax','condo_unit'
    ];

    protected $casts = [
        'optional_benefits' => 'array',
        'extension_covers' => 'array',
    ];
}