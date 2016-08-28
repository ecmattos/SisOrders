@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Ordens de Serviços: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{!! route('patrimonials.show', [$patrimonial->id]) !!}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

    {!! Form::open(['route' => ['orders.store', $patrimonial->id], 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form']) !!}

		@include('orders.form')

    {!! Form::close() !!}

@endsection