<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>SOLICITAÇÃO DE SERVIÇO: {{ $order->id }}</b>
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
            <td class="text-right" width="25%">Cliente</td>
            <td class="text-left" colspan="3"><a href="{!! route('clients.show', [$order->client_id]) !!}">{{ $order->patrimonial->client->code_mask }}</a> - {{ $order->patrimonial->client->description }}</td>
          </tr>
          <tr>
            <td class="text-right" width="25%">Contrato</td>
            <td class="text-left" colspan="3">
              @if($order->contract_id==1)
                {{ $order->contract->code }}
              @else
                <a href="{!! route('contracts.show', [$order->contract_id]) !!}">{{ $order->contract->code }}</a>
              @endif
              - {{ $order->contract->description }}
            </td>
          </tr>

          <tr>
            <td class="text-right">Equipamento</td>
            <td class="text-left" colspan="3"><a href="{!! route('patrimonials.show', [$order->patrimonial_id]) !!}">{{ $order->patrimonial->code }}</a> - {{ $order->patrimonial->patrimonial_sub_type->code }} {{ $order->patrimonial->patrimonial_brand->description }} {{ $order->patrimonial->patrimonial_model->description }} {{ $order->patrimonial->serial }}</td>
          </tr>

          <tr>
            <td class="text-right">Serviços solicitados</td>
            <td class="text-left" colspan="3">{{ $order->requested_services }}</td>
          </tr>

          <tr>
            <td class="text-right">Solicitante</td>
            <td class="text-left">{{ $order->requester }}</td>

            <td class="text-right"><a href="{!! route('orders.cart', [$order->id]) !!}" rel="tooltip" title="Emitir ou Reemtir"><label class="label label-success">(R)Emitir</label></a> | Proposta</td>
            <td class="text-left">
              {{ $order->cart_code }}
            </td>
               
          </tr>
          <tr>
            <td class="text-right">Documento</td>
            <td class="text-left">{{ $order->request_doc }}</td>

            <td class="text-right">Vlr Proposta</td>
            <td class="text-left"> R$ {{ number_format($totalOrder, 2,",",".") }}</td>
          </tr>

          <tr>
            <td class="text-right">Telefone</td>
            <td class="text-left">{{ $order->phone }}</td>
            

            <td class="text-right">Data Proposta</td>
            <td class="text-left">
              @if($order->cart_date)
                {{ $order->cart_date->format('d/m/Y') }}
              @endif
            </td>
          </tr>
        </tbody>
      </table>
    </div>
  </div>
</div>
   
  