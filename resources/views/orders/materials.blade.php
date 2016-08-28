<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>MATERIAIS</b>
    </div>
    <div class="panel-title pull-right">
      @if($order->order_status_id<=2)
        @permission('orders_materials.search')
          <a href="{{ route('orders_materials.search', ['orderId' => $order->id]) }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
        @endpermission
      @endif
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" id="table_orders_materials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="false" data-page-list="[10, 20, 50, 100, All]" data-height="500"> 
      <thead>
        <tr>
          <th data-width="1%" class="text-center">#</th>
          <th data-field="code" data-align="right" data-sortable="true">Código</th>
          <th data-field="description" data-align="left" data-sortable="true">Descrição</th>
          <th data-field="sale_value" data-align="right" data-sortable="false">Vlr Unit R$</th>
          <th data-field="discount" data-align="right" data-sortable="false">Desc %</th>
          <th data-field="material_qty" data-align="right">Qte</th>
          <th data-field="neighborhood" data-align="right">Total Item R$</th>
        </tr>
      </thead>
      <tbody>
        @foreach($order_materials as $order_material)
          <tr>            
            <td>
              @if($order->order_status_id<=2)
                @permission('orders_materials.destroy')
                  <a href="javascript:;" onclick="onDestroy('{!! route('orders_materials.destroy', ['id' => $order_material->id]) !!}')" id="link_delete" type="button" rel="tooltip" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
                @endpermission
              @endif
            </td>
            <td>{{ $order_material->material->code }}</td>
            <td>{{ $order_material->material->description }}</td>
            <td>{{ number_format(($order_material->sale_value * $order_material->factor), 2,",",".") }}</td>
            <td>{{ number_format($order_material->discount, 2,",",".") }}</td>
            <td>{{ number_format($order_material->material_qty, 2,",",".") }} {{ $order_material->material->material_unit->code }}</td>
            <td>{{ number_format((($order_material->sale_value * $order_material->factor) * ((100 - $order_material->discount)/100) * $order_material->material_qty), 2,",",".") }}</td>
          </tr>
        @endforeach
       </tbody>
      <tfoot>
        <tr>
          <td class="text-right" colspan="6">
            <b>Sub-total R$</b>
          </td>
          <td class="text-right" colspan="1">
            <b>{{ number_format($totalMaterial, 2,",",".") }}</b>
          </td>
       </tr>
      </tfoot>
    </table>
  </div>
  </div>
</div>

@section('js_scripts')
  <script type="text/javascript">
    $(function () 
    {
      $('#table_orders_materials').bootstrapTable();
    });
  </script>
@endsection