@extends('layouts.app')

@section('content')
    
    <div class="page-header text-primary">
        <h4>
            Usuários: Inclusão
            <div class="btn-group btn-group-sm pull-right">
                <a class="btn btn-primary" href="{{ route('users') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
            </div>
            <hr class="hr-primary" />
        </h4>
    </div>


    {!! Form::open(['route' => 'users.store', 'class'=>'form-horizontal', 'role'=>'form']) !!}

        <?php $form_action = "create"; ?>

            @include('users.form')

    {!! Form::close() !!}

@endsection
