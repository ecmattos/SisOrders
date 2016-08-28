<div class="panel panel-success">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            <b>{{ $patrimonial->code_client }} - {{ $patrimonial->patrimonial_sub_type->description }} {{ $patrimonial->patrimonial_brand->description }} {{ $patrimonial->patrimonial_model->description }} {{ $patrimonial->serial }}</b>
        </div>
        <div class="panel-title pull-right">
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
            <label for="client_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Proprietário:</label>
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
                <div class="input-group input-group-sm">
                    <label for="client" class="control-label">{{ $client->code_mask }} - {{ $client->description }}</label>
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
            <label for="client_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Contrato:</label>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                    {!! Form::select('contract_id', $contracts, $value = null, ['id'=>'contracts_list', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('requested_services') ? 'has-error' : '' }}">
            <label for="requested_services" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Serviços solicitados:</label>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                    {!! Form::textarea('requested_services', '', $value = null, ['class'=>'form-control', 'maxlength'=>'11']) !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('request_doc') ? 'has-error' : '' }}">
            <label for="request_doc" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Documento:</label>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                    {!! Form::text('request_doc', $value = null, ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('requester') ? 'has-error' : '' }}">
            <label for="requester" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Solicitante:</label>
            <div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
                    {!! Form::text('requester', $value = null, ['class'=>'form-control']) !!}
                </div>
            </div>
        </div>

        <div class="form-group {{ $errors->has('phone') ? 'has-error' : '' }} ">
            <label for="phone" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Telefone:</label>
            <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
                <div class="input-group input-group-sm">
                    <span class="input-group-addon"><i class="fa fa-phone"></i></span>
                    {!! Form::text('phone', $value = null, ['id'=>'phone', 'class'=>'form-control', 'maxlength'=>'11']) !!}
                </div>
            </div>
        </div>
    </div>
    <div class="panel-footer text-center">
        <a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}" type="button" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
        <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
    </div>
</div>

@section('js_scripts')
	<script type="text/javascript">
	  	$("#contracts_list").select2();
	</script>
@endsection