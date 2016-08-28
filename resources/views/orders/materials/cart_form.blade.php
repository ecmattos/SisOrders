<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>MATERIAL: INCLUSÃO</b>
    </div>
    <div class="panel-title pull-right">
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
        </thead>
        <tbody>
          <tr>
            <td class="text-right" width="25%">Código</td>
            <td class="text-left">{{ $material->code }}</td>
          </tr>
          <tr>
            <td class="text-right" width="25%">Descrição</td>
            <td class="text-left">{{ $material->description }}</td>
          </tr>

          <tr>
            <td class="text-right">Unidade</td>
            <td class="text-left">{{ $material->material_unit->code }}</td>
          </tr>

          <tr>
            <td class="text-right">Valor Unitário</td>
            <td class="text-left">R$ {{ number_format(($material->sale_value * $factor), 2,",",".") }}</td>
          </tr>
        </tbody>
      </table>
    </div>

    <div class="form-group {{ $errors->has('discount') ? 'has-error' : '' }}">
      <label for="discount" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Desconto (%):</label>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-money"></i></span>
          {!! Form::text('discount', $value = '0,00', ['id'=>'discount', 'class'=>'form-control', 'autofocus'=>'autofocus']) !!}
        </div>
      </div>
    </div>

    <div class="form-group {{ $errors->has('material_qty') ? 'has-error' : '' }}">
      <label for="material_qty" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Qte:</label>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-money"></i></span>
          {!! Form::text('material_qty', $value = '1,00', ['id'=>'material_qty', 'class'=>'form-control']) !!}
        </div>
      </div>
    </div>
  </div>
  <div class="panel-footer text-center">
    <a href="{!! route('orders.show', [$order->id]) !!}" type="button" class="btn btn-danger">Cancelar <i class="fa fa-times"></i></a>
    <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
  </div>
</div>
   
@section('js_scripts')
  <script type="text/javascript">
      $("#discount, #material_qty").priceFormat(
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
