<?php

class Reservation extends \Eloquent {
	protected $fillable = [];
	use SoftDeletingTrait;
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
	public function getdateOriginalAttribute() {
		return $tmpdate = $this->attributes['date'];

	}
	public function getmontoSinIvaAttribute() {
		$tmpmonto = $this->attributes['totalAmmount'];
		if ($tmpmonto > 0) {
			$tmpmonto = $tmpmonto/1.12;
			return number_format($tmpmonto, 2, ',', '.')." Bs.";
		} else {
			return 0;
		}
	}
	public function getmontoIvaAttribute() {
		$tmpmonto = $this->attributes['totalAmmount'];
		$iva      = Variable::where('name', '=', 'iva')->first();
		if ($tmpmonto > 0) {
			$tmpmonto2 = $tmpmonto/(1+($iva->value/100));
			$iva       = $tmpmonto-$tmpmonto2;
			return number_format($iva, 2, ',', '.')." Bs.";
		} else {
			return 0;
		}
	}
	public function getmontoTotalAPagarEscritoAttribute() {
		$tmpmonto = $this->attributes['totalAmmount'];
		if ($tmpmonto > 0) {
			return number_format($tmpmonto, 2, ',', '.')." Bs.";
		} else {
			return 0;
		}
	}
	public function getmontoServicioEscritoAttribute() {
		$tmpmonto = $this->attributes['totalAmmount'];
		$servicio = Variable::where('name', '=', 'servicio')->first();
		if ($tmpmonto > 0) {
			$tmpmonto2 = $tmpmonto*($servicio->value/100);
			return number_format($tmpmonto2, 2, ',', '.')." Bs.";
		} else {
			return 0;
		}
	}
	public function getmontoConServicioEscritoAttribute() {
		$tmpmonto = $this->attributes['totalAmmount'];
		$servicio = Variable::where('name', '=', 'servicio')->first();
		if ($tmpmonto > 0) {
			$tmpmonto2 = $tmpmonto*(1+($servicio->value/100));
			return number_format($tmpmonto2, 2, ',', '.')." Bs.";
		} else {
			return 0;
		}
	}
	public function getmontoConServicioAttribute() {
		$tmpmonto = $this->attributes['totalAmmount'];
		$servicio = Variable::where('name', '=', 'servicio')->first();
		if ($tmpmonto > 0) {
			$tmpmonto2 = $tmpmonto*(1+($servicio->value/100));
			return $tmpmonto2;
		} else {
			return 0;
		}
	}
	public function getstatusAttribute() {
		$statustemp  = $this->attributes['paymentStatus_id'];
		$returnedVal = '';
		switch ($statustemp):
		case 1:
			$returnedVal = 'danger';
			break;
		case 2:
			$returnedVal = 'warning';
			break;
		case 3:
			$returnedVal = 'info';
			break;
		case 4:
			$returnedVal = 'success';
			break;
			endswitch;
			return $returnedVal;
		}
		public function getMontoServicio() {

		}
		public function passenger() {
			return $this->hasMany('Passenger');
		}
		public function payment() {
			return $this->hasMany('Payment');
		}
		public function client() {
			return $this->belongsTo('Client');
		}
		public function paymentstatus() {
			return $this->belongsTo('Paymentstatus', 'paymentStatus_id');
		}
		public function paymenttype() {
			return $this->belongsTo('Paymenttype');
		}
		public function boat() {
			return $this->belongsTo('Boat');
		}
		public function tour() {
			return $this->belongsTo('Tour');
		}
	}