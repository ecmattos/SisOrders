<div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
    <label for="name" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nome:</label>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            {!! Form::text('name', $value = null, ['class'=>'form-control', 'maxlength'=>'20']) !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
    <label for="email" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">E-mail:</label>
    <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
            {!! Form::input('email', 'email', $value = null, ['class'=>'form-control']) !!}
        </div>
    </div>
</div>

<?php
    if($form_action == "create")
    {
    ?>
        <div class="form-group {{ $errors->has('password') ? 'has-error' : '' }}">
            <label for="password" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Senha:</label>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    {!! Form::password('password', $value = null, ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('comfirm_password') ? 'has-error' : '' }}">
            <label for="comfirm_password" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Confirmar Senha:</label>
            <div class="col-xs-12 col-sm-4 col-md-3 col-lg-3">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-envelope"></i></span>
                    {!! Form::password('confirm-password', $value = null, ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>
    <?php
    }
?>

<div class="form-group {{ $errors->has('roles') ? 'has-error' : '' }}">
    <label for="roles" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unidade:</label>
    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            {!! Form::select('roles[]', $roles,[], ['id'=>'roles_list', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group">
    <label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
        <div class="form-group col-sm-4">
            <a href="{{ URL::previous() }}" type="button" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
            <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
        </div>
</div>

@section('js_scripts')
    <script type="text/javascript">
        $("#roles_list").select2();
    </script>
@endsection