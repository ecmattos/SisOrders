<div class="form-group {{ $errors->has('code') ? 'has-error' : '' }}">
	<label for="code" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Código:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('code', $value = null, ['class'=>'form-control', 'maxlength'=>'20', 'autofocus'=>'autofocus']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('description') ? 'has-error' : '' }}">
	<label for="description" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Descrição:</label>
	<div class="col-xs-12 col-sm-6 col-md-4 col-lg-4">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::text('description', $value = null, ['class'=>'form-control', 'maxlength'=>'100']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('material_unit_id') ? 'has-error' : '' }}">
	<label for="city_id" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Unidade:</label>
	<div class="col-xs-12 col-sm-4 col-md-2 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
			{!! Form::select('material_unit_id', $material_units, $value = null, ['id'=>'material_units_list', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('cost_value') ? 'has-error' : '' }}">
	<label for="cost_value" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Valor custo:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('cost_value', $value = null, ['id'=>'cost_value', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('sale_value') ? 'has-error' : '' }}">
	<label for="sale_value" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Valor venda:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('sale_value', $value = null, ['id'=>'sale_value', 'class'=>'form-control']) !!}
		</div>
	</div>
</div>

<div class="form-group {{ $errors->has('stock_qty') ? 'has-error' : '' }}">
	<label for="stock_qty" class="col-xs-12 col-sm-2 col-md-2 col-lg-2 control-label">Qte estoque:</label>
	<div class="col-xs-12 col-sm-3 col-md-3 col-lg-2">
		<div class="input-group input-group-sm">
			<span class="input-group-addon"><i class="fa fa-money"></i></span>
			{!! Form::text('stock_qty', $value = null, ['id'=>'stock_qty', 'class'=>'form-control']) !!}
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
	  	$("#material_units_list").select2();

	  	$("#cost_value, #sale_value, #stock_qty").priceFormat(
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
