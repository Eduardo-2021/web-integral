<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    use HasFactory;
    protected $table = 'hotel';
    protected $fillable = ['nombre', 'descripcion', 'telefono', 'cant_habitaciones', 'direccion', 'precio'];
    public $timestamps = false;

    public function rentas() {
        return $this->hasMany('App\Models\Renta', 'renta_hotel', 'idRenta', 'idHotel');
    }
}
