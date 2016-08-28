@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
	   	<h4>
	   		Contratos: Alteração
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('contracts') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	{!! Form::model($contract, ['route' => ['contracts.update', $contract->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

	    @include('contracts.form')

	{!! Form::close() !!}
	    
@endsection