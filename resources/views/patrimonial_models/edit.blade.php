@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Equipamentos - Modelos: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('patrimonial_models') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($patrimonial_model, ['route' => ['patrimonial_models.update', $patrimonial_model->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_models.form')

	{!! Form::close() !!}
	    
@endsection