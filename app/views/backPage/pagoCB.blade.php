@extends('backPage.layout')
@section('Titulo')
Pagos
@stop
@section('content')
	<h1>								<a href="{{ $linkmp }}" name="MP-Checkout" class="lightblue-ar-s-ov" mp-mode="modal" onreturn="execute_my_onreturn">Pagar</a>
</h1>
<script type="text/javascript">
	(function(){function $MPBR_load(){window.$MPBR_loaded !== true && (function(){var s = document.createElement("script");s.type = "text/javascript";s.async = true;
	 s.src = ("https:"==document.location.protocol?"https://www.mercadopago.com/org-img/jsapi/mptools/buttons/":"http://mp-tools.mlstatic.com/buttons/")+"render.js";
	 var x = document.getElementsByTagName('script')[0];
	 x.parentNode.insertBefore(s, x);
	 window.$MPBR_loaded = true;
	})();}
	window.$MPBR_loaded !== true ? (window.attachEvent ? window.attachEvent('onload', $MPBR_load) : window.addEventListener('load', $MPBR_load, false)) : null;
})();
</script>@stop
@section('areaInformacion')

@stop
@section('informacionAbajo')

@stop