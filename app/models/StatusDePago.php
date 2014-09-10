<?php
class StatusDePago extends Eloquent {

    protected $table = 'statusdepagos';

    public function reservas(){
        return $this->hasMany('Reservas');
    }
}