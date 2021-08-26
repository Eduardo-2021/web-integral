<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticable; 

class Cliente extends Authenticable
{
    use Notifiable;
    protected $table = 'cliente';
    protected $fillable = ['nombre', 'email', 'telefono', 'pass'];
    protected $hidden = ['pass', 'api_token'];
    public $primaryKey = 'usuario';
    protected $keyType = 'string';
    public $incrementing = false; 
    public $timestamps = false;

    
    public function renta() {
        return $this->hasMany('App\Models\Renta', 'cliente');
    }

    public function getAuthPassword(){
        return $this->attributes['pass'];
    }
}
