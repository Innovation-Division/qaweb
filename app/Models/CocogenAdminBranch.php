<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CocogenAdminBranch extends Model
{
    use HasFactory;

    protected $table = 'cocogen_admin_branch'; // Prevent Laravel from pluralizing
    protected $fillable = ['name'];
}
