@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Equipamentos - Tipos: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('patrimonial_types') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'patrimonial_types.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_types.form')

	{!! Form::close() !!}

@endsection
