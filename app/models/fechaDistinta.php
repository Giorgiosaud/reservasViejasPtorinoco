<?php

class FechaDistinta extends Eloquent {
	protected $table = 'fechasdistintas';
	public function setfechaAttribute($fecha) {
		if ($fecha) {
			$this->attributes['fecha'] = date('Y-m-d', (strtotime($fecha)));
		} else {
			$this->attributes['fecha'] = '';
		}
	}

	public function getfechaAttribute() {
		$tmpdate = $this->attributes['fecha'];
		if ($tmpdate == "0000-00-00" || $tmpdate == "") {
			return "";
		} else {
			return date('d-m-Y', strtotime($tmpdate));
		}
	}
}
