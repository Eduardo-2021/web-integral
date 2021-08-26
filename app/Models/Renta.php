<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Renta extends Model
{
    use HasFactory;
    protected $table = 'renta';
    protected $fillable = ['fecha_i', 'fecha_e', 'renta_hab', 'total', 'forma_pago', 'n_cliente'];
    public $timestamps = false;

    public function cliente() {
        return $this->belongsTo('App\Models\Cliente', 'cliente');
    }

    public function hoteles() {
        return $this->belongsTo('App\Models\Hotel', 'renta_hotel', 'idHotel', 'idRenta');
    }
}
