<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customer';
    protected $primaryKey = 'id_customer';
    protected $forainKey = 'id_category';
    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'created_at',
        'updated_at',
        'id_category',
    ];
}
