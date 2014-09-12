<?php

class Embarcacion extends Eloquent {
	protected $table = 'embarcaciones';
    public function reservas(){
        return $this->hasMany('Reserva');
    }
    public function paseos()
    {
        return $this->belongsToMany('Paseo', 'embarcacion_paseos', 'embarcacion_id', 'paseos_id');
    }
}
