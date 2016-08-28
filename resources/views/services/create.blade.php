@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Serviços: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('services') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'services.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('services.form')

	{!! Form::close() !!}

@endsection
