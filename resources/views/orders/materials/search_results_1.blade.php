<div class="panel panel-success">
	<div class="panel-heading">
    	<h3 class="panel-title"><b>MATERIAIS LOCALIZADOS</b></h3>
  	</div>
  	<div class="panel-body">
    	<div class="table-responsive">
    		<div class="table-responsive">
    			<table class="table table-bordered table-striped" id="table_materials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="false" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]"> 
					<thead>
						<tr>
							<th data-width="1%" class="text-center">#</a></th>
							<th data-width="5%" data-field="code" data-sortable="true" data-align="right">Código</th>
							<th data-field="description" data-sortable="true">Descrição</th>
							<th data-width="10%" data-field="sale_value" data-align="right">Valor Unit</th>
							<th data-width="5%" data-field="unit" data-align="right">Unidade</th>
						</tr>
					</thead>
					<tbody>
					    @foreach($materials as $material)
					        <tr>
					            <td>
					                <a href="{!! route('orders_materials.cart', ['orderId' => $order->id, 'materialId' => $material->id]) !!}" type="button"><i class="fa fa-arrow-down"></i></a>
					            </td>
					            <td>{{ $material->code }}</td>
					            <td>{{ $material->description }}</td>
					            <td>R$ {{ number_format(($material->sale_value * $factor), 2,",",".") }}</td>
					            <td>{{ $material->material_unit->code }}</td>
					        </tr>
					    @endforeach
				    </tbody>
				</table>
			</div>
  		</div>
	</div>
</div>