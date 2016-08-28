@extends('layouts.app')

@section('content')
	
	<div class="page-header text-primary">
	   	<h4>
	   		Materiais - Unidades: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('material_units') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::open(['route' => 'material_units.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

	    @include('material_units.form')

	{!! Form::close() !!}

@endsection
