@extends('layouts.app')

@section('content')
 	<div class="page-header text-primary">
   	<h4>
   		Ordens de Serviço: Consulta
   		<div class="btn-group btn-group-sm pull-right">
     		<a class="btn btn-primary" href="{{ route('orders') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
   		</div>
   		<hr class="hr-primary" />
   	</h4>
 	</div>

 	<div class="row">
   	<div class="col-sm-8">
   		@include('orders.order')
   	</div>

   	<div class="col-sm-4">  
   		{!! Form::open(['route' => ['orders_services.search_results', 'orderId' => $order->id], 'class'=>'form-horizontal', 'role'=>'form']) !!}

    		@include('orders.services.search_form')

      {!! Form::close() !!}
   	</div>
 	</div> 

 	<div class="row">
   	<div class="col-sm-12">
   		@include('orders.services.search_results_1')
		</div>
	</div>

@endsection
