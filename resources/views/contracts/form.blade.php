<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('client_id') ? 'has-error' : '' }}">
    <label for="client_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Cliente:</label>
    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            {!! Form::select('client_id', $clients, $value = null, ['id'=>'clients_list', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('manager_id') ? 'has-error' : '' }}">
    <label for="manager_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Gestor:</label>
    <div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
        <div class="input-group input-group-sm">
            <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
            {!! Form::select('manager_id', $managers, $value = null, ['id'=>'managers_list', 'class'=>'form-control']) !!}
        </div>
    </div>
</div>

<div class="form-group {{ $errors->has('date_start') ? 'has-error' : '' }}">
	<label for="date_start" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data início:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('date_start', isset($contract->date_start) ? $contract->date_start->format('d/m/Y') : null, ['id'=>'daterangerpicker_date_start', 'class'=>'form-control']) !!}

		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('date_end') ? 'has-error' : '' }}">
	<label for="date_end" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Data término:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-calendar"></i></span>
			{!! Form::text('date_end', isset($contract->date_end) ? $contract->date_end->format('d/m/Y') : null, ['id'=>'daterangerpicker_date_end', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('factor_material') ? 'has-error' : '' }}">
	<label for="factor_material" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Fator Material:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('factor_material', $value = null, ['id'=>'factor_material', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('factor_service') ? 'has-error' : '' }}">
	<label for="factor_service" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Fator Serviço:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('factor_service', $value = null, ['id'=>'factor_service', 'class'=>'form-control']) !!}
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
	  	$("#clients_list, #manager_list").select2();
	
		$("#daterangerpicker_date_start").datepicker(
		  	{
		  		yearRange: '2016:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#daterangerpicker_date_end").datepicker("option", "minDate", selectedDate);
		  		}
		  	});

		$("#daterangerpicker_date_end").datepicker(
		  	{
		  		yearRange: '1960:'+(new Date).getFullYear(),
		  		defaultDate: "+1w",
		  		changeMonth: true,
		  		numberOfMonths: 3,
		  		maxDate: "today()",
		  		onClose: function(selectedDate)
		  		{
		  			$("#daterangerpicker_date_start").datepicker("option", "maxDate", selectedDate);
		  		}
		  	});

		$("#factor_material, #factor_service").priceFormat(
  		{
 			prefix: '',
		    centsSeparator: ',', 
		    thousandsSeparator: '.',
		    limit: false,
		    centsLimit: 2,
		    clearPrefix: false,
		    allowNegative: false
  		});
	</script>
@endsection