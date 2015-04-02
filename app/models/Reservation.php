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
	public function uptateAmmounts() {
		$pagosRecibidos                   = $this->payments()->sum('ammount');
		$precios                          = $this->tour->prices()->orderBy('id', 'DESC')->first();
		$totalAPagar                      = $this->attributes['adults']*$precios['adult']+$this->attributes['olders']*$precios['older']+$this->attributes['childs']*$precios['child'];
		$this->attributes['totalAmmount'] = $totalAPagar;
		$montoDeuda                       = $totalAPagar-$pagosRecibidos;

		if ($montoDeuda <= 0) {
			$this->attributes['paymentStatus_id'] = '4';
		} elseif ($montoDeuda > 0) {
			if ($montoDeuda == $totalAPagar) {
				if ($this->attributes['paymentStatus_id'] != '2') {
					$this->attributes['paymentStatus_id'] = '1';
				}
			} else {
				$this->attributes['paymentStatus_id'] = '3';
			}
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
		public function passengers() {
			return $this->hasMany('Passenger');
		}
		public function payments() {
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