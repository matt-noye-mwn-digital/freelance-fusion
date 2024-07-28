<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientDetail extends Model
{
    use HasFactory;

    protected $fillable = [
        'client_id',
        'company_name',
        'address_line_one',
        'address_line_two',
        'city',
        'state_region',
        'postcode',
        'country',
        'phone_number',
        'payment_method_id',
        'currency',
        'stackuser',
    ];

    protected function client(){
        return $this->belongsTo(User::class, 'id');
    }
}
