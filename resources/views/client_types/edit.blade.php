@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Clientes - Tipo: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('client_types.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
	
	{!! Form::model($client_type, ['route' => ['client_types.update', $client_type->id], 'method' => 'put', 'class' => 'form-horizontal', 'client_type'=>'form']) !!}

	    @include('client_types.form')

	{!! Form::close() !!}
@endsection