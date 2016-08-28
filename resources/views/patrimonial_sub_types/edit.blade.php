@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Equipamentos - Sub-Tipos: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('patrimonial_sub_types') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($patrimonial_sub_type, ['route' => ['patrimonial_sub_types.update', $patrimonial_sub_type->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_sub_types.form')

	{!! Form::close() !!}
	    
@endsection