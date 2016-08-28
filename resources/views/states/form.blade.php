<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
    <label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
    <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            {!! Form::text('code', $value = null, ['class'=>'form-control', 'autofocus'=>'autofocus', 'maxlength'=>'2']) !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
    <label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
    <div class="col-xs-12 col-sm-6 col-md-3 col-lg-3">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            {!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'30']) !!}
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