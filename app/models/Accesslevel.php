<?php

class Accesslevel extends \Eloquent {
	protected $fillable = [];
	public function users() {
		return $this->belongsToMany('User');
	}
}