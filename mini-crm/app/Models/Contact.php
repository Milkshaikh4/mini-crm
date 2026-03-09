<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    /** @use HasFactory<\Database\Factories\ContactFactory> */
    use HasFactory;

    protected $fillable = ['company_id', 'first_name', 'last_name', 'position', 'phone', 'email', 'status'];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
