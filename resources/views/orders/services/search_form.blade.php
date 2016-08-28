<div class="panel panel-success">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            <b>SERVIÇOS: PESQUISA</b>
        </div>
        <div class="panel-title pull-right">
        </div>
        <div class="clearfix"></div>
    </div>

    <div class="panel-body">
        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="code" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Código:</label>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                    {!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'10']) !!}
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="client_id" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">e/ou</label>
        </div>

        <div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
            <label for="description" class="col-xs-12 col-sm-3 col-md-3 col-lg-3 control-label">Descrição:</label>
            <div class="col-xs-12 col-sm-8 col-md-8 col-lg-8">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                    {!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'10']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer text-center">
        <a href="{!! route('orders.show', [$order->id]) !!}" type="button" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
        <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
    </div>
</div>