<?php

return array(

	/*
	|--------------------------------------------------------------------------
	| Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| El following language lines contain El default error messages used by
	| El validator class. Some of Else rules have multiple versions such
	| as El size rules. Feel free to tweak each of Else messages here.
	|
	 */

	"accepted"   => "El :attribute debe ser aceptado.",
	"active_url" => "El :attribute is not a valid URL.",
	"after"      => "El :attribute debe ser una fecha despues :date.",
	"alpha"      => "El :attribute debe contener Letras.",
	"alpha_dash" => "El :attribute debe contener Letras, numeros, y guiones.",
	"alpha_num"  => "El :attribute debe contener Letras y numeros.",
	"array"      => "El :attribute debe ser un array.",
	"before"     => "El :attribute debe ser una fecha antes :date.",
	"between"    => array(
		"numeric"   => "El :attribute debe ser entre :min y :max.",
		"file"      => "El :attribute debe ser entre :min y :max kilobytes.",
		"string"    => "El :attribute debe ser entre :min y :max caracteres.",
		"array"     => "El :attribute debe serve entre :min y :max items.",
	),
	"confirmed"      => "El :attribute y su confirmacion no coinciden.",
	"date"           => "El :attribute no es una fecha valida.",
	"date_format"    => "El :attribute no coincide con el formato :format.",
	"different"      => "El :attribute y :other deben ser different.",
	"digits"         => "El :attribute debe ser :digits digitos.",
	"digits_between" => "El :attribute debe ser entre :min y :max digits.",
	"email"          => "El :attribute debe ser una direccion de correo valida.",
	"exists"         => "El atributo :attribute es invalido.",
	"image"          => "El :attribute debe ser una imagen.",
	"in"             => "El atributo :attribute seleccionado es invalido.",
	"integer"        => "El :attribute debe ser un entero.",
	"ip"             => "El :attribute debe ser una direccion Ip Valida.",
	"max"            => array(
		"numeric"       => "El :attribute no debe ser mayor a :max.",
		"file"          => "El :attribute no debe pesar mas de :max kilobytes.",
		"string"        => "El :attribute no debe ser mas grande que :max letras.",
		"array"         => "El :attribute no debe contener mas de  :max items.",
	),
	"mimes"    => "El :attribute debe ser de tipo de extension: :values.",
	"min"      => array(
		"numeric" => "El :attribute debe ser al menos :min.",
		"file"    => "El :attribute debe ser al menos :min kilobytes.",
		"string"  => "El :attribute debe ser al menos de  :min letras.",
		"array"   => "El :attribute debe tener al menos :min items.",
	),
	"not_in"               => "El selected :attribute es invalido.",
	"numeric"              => "El :attribute debe ser numerico.",
	"regex"                => "El :attribute format es invalido.",
	"required"             => "El :attribute field debe ser llenado.",
	"required_if"          => "El :attribute field debe ser llenado cuando :other is :value.",
	"required_with"        => "El :attribute field debe ser llenado cuando :values is present.",
	"required_with_all"    => "El :attribute field debe ser llenado cuando :values is present.",
	"required_without"     => "El :attribute field debe ser llenado cuando :values is not present.",
	"required_without_all" => "El :attribute field debe ser llenado cuando ninguno de :values estan presentes.",
	"same"                 => "El :attribute y :other debe el mismo.",
	"size"                 => array(
		"numeric"             => "El :attribute debe ser :size.",
		"file"                => "El :attribute debe ser :size kilobytes.",
		"string"              => "El :attribute debe ser :size letras.",
		"array"               => "El :attribute debe serntain :size items.",
	),
	"unique" => "El :attribute ya existe.",
	"url"    => "El formato de :attribute es invalido.",

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Language Lines
	|--------------------------------------------------------------------------
	|
	| Here you may specify custom validation messages for attributes using El
	| convention "attribute.rule" to name El lines. This makes it quick to
	| specify a specific custom language line for a given attribute rule.
	|
	 */

	'custom'          => array(
		'attribute-name' => array(
			'rule-name'     => 'custom-message',
		),
	),

	/*
	|--------------------------------------------------------------------------
	| Custom Validation Attributes
	|--------------------------------------------------------------------------
	|
	| El following language lines are used to swap attribute place-holders
	| with something more reader friendly such as E-Mail Address instead
	| of "email". This simply helps us make messages a little cleaner.
	|
	 */

	'attributes' => array(),

);
