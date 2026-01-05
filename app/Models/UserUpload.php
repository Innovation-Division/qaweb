<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserUpload extends Model
{
    use HasFactory;

    protected $table = 'user_uploads'; // Prevent Laravel from pluralizing
    protected $fillable = ['policyholder_id', 'filename', 'filesize', 'location']; // Remove email from fillable fields

    public function policyholder()
    {
        return $this->belongsTo(Policyholder::class, 'policyholder_id');
    }
}