@extends('backPage.layout')
@section('Titulo')
Login
@stop
@section('content')
{{ Form::model($mercadopago,array('url' => 'http://reservas.puertorinoco.com/mpPayment', 'method' => 'post'))}}
{{ Form::label('id','id') }}
{{ Form::text('id',$mercadopago->idMercadoPago) }}
{{ Form::label('idMercadoPago','idMercadoPago') }}
{{ Form::text('idMercadoPago') }}
{{ Form::label('site_id','site_id') }}
{{ Form::text('site_id') }}
{{ Form::label('operation_type','operation_type') }}
{{ Form::text('operation_type') }}
{{ Form::label('order_id','order_id') }}
{{ Form::text('order_id') }}
{{ Form::label('external_reference','external_reference') }}
{{ Form::text('external_reference') }}
{{ Form::label('status','status') }}
{{ Form::text('status') }}
{{ Form::label('status_detail','status_detail') }}
{{ Form::text('status_detail') }}
{{ Form::label('payment_type','payment_type') }}
{{ Form::text('payment_type') }}
{{ Form::label('date_created','date_created') }}
{{ Form::text('date_created') }}
{{ Form::label('last_modified','last_modified') }}
{{ Form::text('last_modified') }}
{{ Form::label('date_approved','date_approved') }}
{{ Form::text('date_approved') }}
{{ Form::label('money_release_date','money_release_date') }}
{{ Form::text('money_release_date') }}
{{ Form::label('currency_id','currency_id') }}
{{ Form::text('currency_id') }}
{{ Form::label('transaction_amount','transaction_amount') }}
{{ Form::text('transaction_amount') }}
{{ Form::label('shipping_cost','shipping_cost') }}
{{ Form::text('shipping_cost') }}
{{ Form::label('finance_charge','finance_charge') }}
{{ Form::text('finance_charge') }}
{{ Form::label('total_paid_amount','total_paid_amount') }}
{{ Form::text('total_paid_amount') }}
{{ Form::label('net_received_amount','net_received_amount') }}
{{ Form::text('net_received_amount') }}
{{ Form::label('reason','reason') }}
{{ Form::text('reason') }}
{{ Form::label('payerId','payerId') }}
{{ Form::text('payerId') }}
{{ Form::label('payerfirst_name','payerfirst_name') }}
{{ Form::text('payerfirst_name') }}
{{ Form::label('payerlast_name','payerlast_name') }}
{{ Form::text('payerlast_name') }}
{{ Form::label('payeremail','payeremail') }}
{{ Form::text('payeremail') }}
{{ Form::label('payernickname','payernickname') }}
{{ Form::text('payernickname') }}
{{ Form::label('phonearea_code','phonearea_code') }}
{{ Form::text('phonearea_code') }}
{{ Form::label('phonenumber','phonenumber') }}
{{ Form::text('phonenumber') }}
{{ Form::label('phoneextension','phoneextension') }}
{{ Form::text('phoneextension') }}
{{ Form::label('collectorid','collectorid') }}
{{ Form::text('collectorid') }}
{{ Form::label('collectorfirst_name','collectorfirst_name') }}
{{ Form::text('collectorfirst_name') }}
{{ Form::label('collectorlast_name','collectorlast_name') }}
{{ Form::text('collectorlast_name') }}
{{ Form::label('collectoremail','collectoremail') }}
{{ Form::text('collectoremail') }}
{{ Form::label('collectornickname','collectornickname') }}
{{ Form::text('collectornickname') }}
{{ Form::label('collectorphonearea_code','collectorphonearea_code') }}
{{ Form::text('collectorphonearea_code') }}
{{ Form::label('collectorphonenumber','collectorphonenumber') }}
{{ Form::text('collectorphonenumber') }}
{{ Form::label('collectorphoneextension','collectorphoneextension') }}
{{ Form::text('collectorphoneextension') }}
{{ Form::submit('enviar') }}


{{ Form::close() }}
@stop