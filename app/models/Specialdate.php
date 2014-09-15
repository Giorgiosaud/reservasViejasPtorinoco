<?php

class Specialdate extends \Eloquent {
	protected $fillable = [];
	public function setdateAttribute($date) {
		if ($date) {
			$this->attributes['date'] = date('Y-m-d', (strtotime($date)));
		} else {
			$this->attributes['date'] = '';
		}
	}

	public function getdateAttribute() {
		$tmpdate = $this->attributes['date'];
		if ($tmpdate == "0000-00-00" || $tmpdate == "") {
			return "";
		} else {
			return date('d-m-Y', strtotime($tmpdate));
		}
	}
}