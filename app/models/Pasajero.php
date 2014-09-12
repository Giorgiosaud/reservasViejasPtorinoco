<?php

class Pasajero extends Eloquent {
    public function reserva()
    {
        return $this->belongsTo('Reserva');
    }
}
