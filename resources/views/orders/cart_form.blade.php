<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>PROPOSTA</b>
    </div>
    <div class="panel-title pull-right">
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <div class="form-group {{ $errors->has('cart_code') ? 'has-error' : '' }}">
      <label for="cart_code" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Código:</label>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
          {!! Form::text('cart_code', $value = null, ['class'=>'form-control', 'autofocus'=>'autofocus']) !!}
        </div>
      </div>
    </div>

    <div class="form-group {{ $errors->has('cart_date') ? 'has-error' : '' }}">
      <label for="cart_date" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Data:</label>
      <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
          {!! Form::text('cart_date', isset($order->cart_date) ? $order->cart_date->format('d/m/Y') : null, ['id'=>'cart_datepicker', 'class'=>'form-control']) !!}
        </div>
      </div>
    </div>

    <div class="form-group {{ $errors->has('delivery_time_days') ? 'has-error' : '' }}">
      <label for="delivery_time_days" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Prazo entrega:</label>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
          {!! Form::text('delivery_time_days', $value = null, ['id'=>'delivery_time_days', 'class'=>'form-control']) !!}
        </div>
      </div>
      dias após aprovação
    </div>

    <div class="form-group {{ $errors->has('payment_condition') ? 'has-error' : '' }}">
      <label for="payment_condition" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Cond.pagto:</label>
      <div class="col-xs-12 col-sm-3 col-md-3 col-lg-3">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
          {!! Form::text('payment_condition', $value = null, ['id'=>'payment_condition', 'class'=>'form-control']) !!}
        </div>
      </div>
      dias
    </div>

    <div class="form-group {{ $errors->has('portage') ? 'has-error' : '' }}">
      <label for="portage" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Transporte:</label>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
          {!! Form::text('portage', $value = null, ['class'=>'form-control']) !!}
        </div>
      </div>
    </div>

    <div class="form-group {{ $errors->has('portage') ? 'has-error' : '' }}">
      <label for="portage" class="col-xs-12 col-sm-2 col-md-2 col-lg-3 control-label">Notificar Cliente:</label>
      <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6">
        <div class="input-group input-group-sm">
          <span class="input-group-addon"><i class="fa fa-question-circle"></i></span>
          {!! Form::text('portage', $value = null, ['class'=>'form-control']) !!}
        </div>
      </div>
    </div>

  </div>
  <div class="panel-footer text-center">
    <button type="submit" class="btn btn-success">Confirmar <i class="fa fa-check"></i></button>
  </div>
</div>
   
@section('js_scripts')
  <script type="text/javascript">
      $("#cart_datepicker").datepicker(
        {
            yearRange: '1960:'+(new Date).getFullYear(),  
            maxDate: "today()"
        }
      );

      $("#delivery_time_days, #payment_condition").priceFormat(
      {
        prefix: '',
        centsSeparator: ',', 
        thousandsSeparator: '.',
        limit: false,
        centsLimit: 0,
        clearPrefix: false,
        allowNegative: false
      });
  </script>
@endsection
