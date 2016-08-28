@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Cidades: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('cities.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
	
	{!! Form::model($city, ['route' => ['cities.update', $city->id], 'method' => 'put', 'class' => 'form-horizontal', 'city'=>'form']) !!}

	    @include('cities.form')

	{!! Form::close() !!}
@endsection