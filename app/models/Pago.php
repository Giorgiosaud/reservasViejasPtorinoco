<?php

class Pago extends Eloquent {
    public function reserva(){
        return $this->belongsTo('Reserva');
    }
    public function tipoDePago(){
        return $this->belongsTo('TipoDePago');
    }
    public function mercadopago(){
    return $this->belongsTo('Mercadopago');
    }
}
