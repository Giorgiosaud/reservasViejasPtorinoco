<?php

class Paseo extends Eloquent {
    public function embarcaciones()
    {
        return $this->belongsToMany('Embarcacion');
    }
    public function reservas(){
        return $this->hasMany('Reserva');
    }
}
