<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function lineItems(){
        return $this->hasMany(InvoiceLineItem::class);
    }
    public function client(){
        return $this->belongsTo(User::class);
    }
}
