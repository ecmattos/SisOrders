@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Clientes - Tipo: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('client_types.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

    {!! Form::open(['route' => 'client_types.store', 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form']) !!}

        @include('client_types.form')

    {!! Form::close() !!}

@endsection