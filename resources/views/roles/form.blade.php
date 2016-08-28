<div class="col-sm-7">
    <div class="form-group {{ $errors->has('name') ? 'has-error' : '' }}">
        <label for="name" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Nome:</label>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                {!! Form::text('name', $value = null, ['class'=>'form-control', 'maxlength'=>'10']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('display_name') ? 'has-error' : '' }}">
        <label for="display_name" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Display Name:</label>
        <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                {!! Form::text('display_name', $value = null, ['class'=>'form-control', 'maxlength'=>'40']) !!}
            </div>
        </div>
    </div>

    <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
        <label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-4">
            <div class="input-group input-group-sm">
                <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                {!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'40']) !!}
            </div>
        </div>
    </div>
</div>

<div class="col-sm-5">
    <div class="form-group {{ $errors->has('premissions') ? 'has-error' : '' }}">
        <label for="permissions" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Permissões:</label>
        <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
            <div class="input-group input-group-sm">
                @if(isset($model))
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                        {{ $value->display_name }}</label>
                        <br/>
                    @endforeach
                @else
                    @foreach($permission as $value)
                        <label>{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                        {{ $value->display_name }}</label>
                        <br/>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>

<div class="form-group">
    <label for="submit" class="col-xs-2 col-sm-2 col-md-2 col-lg-2 control-label"></label>
        <div class="form-group col-sm-4">
            <a href="{{ URL::previous() }}" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
             <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
        </div>
</div>