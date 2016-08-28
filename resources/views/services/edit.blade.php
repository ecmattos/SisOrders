@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Serviços: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('services') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($service, ['route' => ['services.update', $service->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('services.form')

	{!! Form::close() !!}
	    
@endsection