@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Equipamentos - Marcas: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('patrimonial_brands') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($patrimonial_brand, ['route' => ['patrimonial_brands.update', $patrimonial_brand->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('patrimonial_brands.form')

	{!! Form::close() !!}
	    
@endsection