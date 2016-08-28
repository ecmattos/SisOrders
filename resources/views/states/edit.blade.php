@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Estados: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('states.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
	
	{!! Form::model($state, ['route' => ['states.update', $state->id], 'method' => 'put', 'class' => 'form-horizontal', 'state'=>'form']) !!}

	    @include('states.form')

	{!! Form::close() !!}
@endsection