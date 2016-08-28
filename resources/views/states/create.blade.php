@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Estados: Inclusão
	   		<div class="btn-group btn-group-sm pull-right">
	   			<a class="btn btn-primary" href="{{ route('states.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

    {!! Form::open(['route' => 'states.store', 'method' => 'post', 'class'=>'form-horizontal', 'role'=>'form']) !!}

        @include('states.form')

    {!! Form::close() !!}

@endsection