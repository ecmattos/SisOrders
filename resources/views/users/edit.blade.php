@extends('layouts.app')

@section('content')

    <div class="page-header text-primary">
        <h4>
            Usuários: Alteração
            <div class="btn-group btn-group-sm pull-right">
                <a class="btn btn-primary" href="{{ route('users') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
            </div>
            <hr class="hr-primary" />
        </h4>
    </div>

    {!! Form::model($user, ['route' => ['users.update', $user->id], 'method' => 'put', 'class' => 'form-horizontal', 'role'=>'form']) !!}

        <?php $form_action = "edit"; ?>

        @include('users.form')

    {!! Form::close() !!}
        
@endsection