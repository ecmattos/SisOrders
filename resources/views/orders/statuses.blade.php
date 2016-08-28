<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>SITUAÇÕES</b>
    </div>
    <div class="panel-title pull-right">
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <table class="table table-bordered table-striped" id="table_clients"> 
      <thead>
        <tr>
          <th class="text-center" width="14%">NÃO PROGRAMADA</th>
          <th class="text-center" width="14%">AVALIAÇÃO</th>
          <th class="text-center" width="14%">AUTORIZAÇÃO</th>
          <th class="text-center" width="14%">EXECUÇÃO</th>
          <th class="text-center" width="14%">PENDENTE</th>
          <th class="text-center" width="14%">CANCELADA</th>
          <th class="text-center" width="14%">CONCLUSÃO</th> 
        </tr>
      </thead>
      <tbody>
        <tr>
          <td class="text-center">
            @if($order->date_status_1)
              {{ $order->date_status_1->format('d/m/Y H:i') }}h 
              @if($order->order_status_id==1)
                <br>
                ({{ $order->date_status_1->diffForHumans() }})
              @endif
            @endif
          </td>

          <td class="text-center">
            @if($order->date_status_2)
              {{ $order->date_status_2->format('d/m/Y H:i') }}h
              <br> 
              @if($order->order_status_id==2)
                ({{ $order->date_status_2->diffForHumans() }})
              @endif
            @endif
            <br>
            @if($order->cart_code)
              @if($order->order_status_id==1)
                <a href="{!! route('orders.set_status_2', ['orderId' => $order->id]) !!}" rel="tooltip" title="(R)Emitir"><label class="label label-success">(Re)Avaliar</label></a>
              @endif
            @endif
          </td>

          <td class="text-center">
            @if($order->date_status_3)
              {{ $order->date_status_3->format('d/m/Y H:i') }}h
              <br> 
              @if($order->order_status_id==3)
                ({{ $order->date_status_3->diffForHumans() }})
              @endif
            @endif
            <br>
            @if($order->order_status_id==2)
              <a href="{!! route('orders.set_status_3', ['orderId' => $order->id]) !!}" rel="tooltip" title="Autorizar"><label class="label label-success">Autorizar</label></a>
            @endif
          </td>

          <td class="text-center">
            @if($order->date_status_4)
              {{ $order->date_status_4->format('d/m/Y H:i') }}h 
              <br>
              @if($order->order_status_id==4)
                ({{ $order->date_status_4->diffForHumans() }})
              @endif
            @endif
            <br>
            @if($order->order_status_id==3)
              <a href="{!! route('orders.set_status_4', ['orderId' => $order->id]) !!}" rel="tooltip" title="Executar"><label class="label label-success">Executar</label></a>
            @endif
          </td>

          <td class="text-center">
            @if($order->date_status_5)
              {{ $order->date_status_5->format('d/m/Y H:i') }}h 
              @if($order->order_status_id==5)
                ({{ $order->date_status_5->diffForHumans() }})
              @endif
            @endif
          </td>

          <td class="text-center">
            @if($order->date_status_6)
              {{ $order->date_status_6->format('d/m/Y H:i') }}h 
            @endif
          </td>

          <td class="text-center">
            @if($order->date_status_7)
              {{ $order->date_status_7->format('d/m/Y H:i') }}h 
            @endif
          </td>
        </tr>
      </tbody>
    </table>
  </div>
</div>