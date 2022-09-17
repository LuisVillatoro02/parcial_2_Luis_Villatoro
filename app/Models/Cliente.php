<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    protected $table='clientes';
    public $timestamps=false;
    protected $fillable=[
        'id', 'nombre', 'apellido', 'dpi','fecha_nac','direccion','created_at', 'updated_at'
    ];

    protected $primaryKey='id';
}
