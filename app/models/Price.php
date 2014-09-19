<?php

class Price extends \Eloquent {
	protected $fillable = [];
	public function tours() {
		return $this->belongsToMany('Tour')->withTimestamps();
	}
}