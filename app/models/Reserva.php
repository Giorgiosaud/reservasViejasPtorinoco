<?php

class Reserva extends Eloquent {

	protected $table      = 'reservas';
	protected $primaryKey = 'numeroDeReserva';
    public function pasajeros(){
            return $this->hasMany('Pasajero');
    }
    public function embarcacion(){
        return $this->belongsTo('Embarcacion');
    }
    public function statusDePago(){
        return $this->belongsTo('StatusDePago');
    }
    public function pagos(){
        return $this->hasMany('Pago');
    }
    public function cliente(){
        return $this->belongsTo('Cliente');
    }
}
