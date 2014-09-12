<?php

class Mercadopago extends Eloquent {
    public function pago(){
        return $this->hasOne('Pago');
    }
}
