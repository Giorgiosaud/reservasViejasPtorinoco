<?php

class NivelDeAcceso extends Eloquent {
	protected $table = 'nivelesDeAcceso';
	public function users() {
		return $this->belongsToMany('User');
	}
}
