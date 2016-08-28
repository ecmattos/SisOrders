<div class="panel panel-success">
    <div class="panel-heading">
        <div class="panel-title pull-left">
            <b>ORDENS DE SERVIÇOS</b>
        </div>
        <div class="panel-title pull-right">
        	@permission('client_types.create')
			  	<a href="{{ route('orders.create', ['patrimonialId' => $patrimonial->id]) }}" rel="tooltip" title="Nova OS"><i class="fa fa-file-o"></i></a>
			@endpermission
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="panel-body">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-show-toggle="false" data-search="false" data-show-filter="false" data-show-columns="false" data-show-export="false" data-pagination="true" data-click-to-select="false" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="5%" data-field="order_id" data-sortable="true" data-align="center">OS</th>
						<th data-width="10%" data-field="code_client" data-sortable="true" data-align="left">Doc</th>
						<th data-field="patrimonial_type_id" data-sortable="false">Serviços Solicitados</th>
						<th data-field="description" data-sortable="false">Solicitante</th>
						<th data-width="15%" data-field="client_id" data-sortable="false">Telefone</th>
						<th data-field="comments">Situação</th>
						<th data-field="services" data-align="right">Serviços R$</th>
						<th data-field="materials" data-align="right">Materiais R$</th>
						<th data-field="totals" data-align="right">Totais R$</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($orders as $order)
				        <tr>
				            <td>
				            	<a href="{!! route('orders.show', [$order->id]) !!}">{{ $order->id }}</a>
				            </td>
				            <td>{{ $order->request_doc }}</td>
				            <td>{{ $order->requested_services }}</td>
				            <td>{{ $order->requester }}</td>
				            <td>{{ $order->phone }}</td>
				            <td>
				            	{{ $order->order_status->description }}
				            	@if($order->date_status_1)
					              desde {{ $order->date_status_1->format('d/m/Y H:m') }}h 
					              @if($order->order_status_id==1)
					                ({{ $order->date_status_1->diffForHumans() }})
					              @endif
					            @endif
				            </td>

				            <td>
				            	@foreach($order_services as $order_service)
				            		@if($order->id == $order_service->order_id)
				            			<?php
				            				$total_order_services += (($order_service->sale_value * $order_service->factor) * ((100 - $order_service->discount)/100) * $order_service->service_qty);
				            			?>	
				            		@endif
				            	@endforeach

				            	{{ number_format($total_order_services, 2,",",".") }}
				            </td>

				            <td>
				            	@foreach($order_materials as $order_material)
				            		@if($order->id == $order_material->order_id)
				            			<?php
				            				$total_order_materials += (($order_material->sale_value * $order_material->factor) * ((100 - $order_material->discount)/100) * $order_material->material_qty);
				            			?>	
				            		@endif
				            	@endforeach

				            	{{ number_format($total_order_materials, 2,",",".") }}
				            </td>

				            <td>
				            	{{ number_format(($total_order_services + $total_order_materials), 2,",",".") }}
				            	<?php
				            		$total_order_services = 0;
				            		$total_order_materials = 0;
				            	?>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			    <tfoot>
			        <tr>
			          	<td class="text-right" colspan="6">
			            	<b>Totais R$</b>
			          	</td>
			          	<td class="text-right" colspan="1">
			            	<b>{{ number_format($total_patrimonial_services, 2,",",".") }}</b>
			          	</td>
			          	<td class="text-right" colspan="1">
			            	<b>{{ number_format($total_patrimonial_materials, 2,",",".") }}</b>
			          	</td>
			          	<td class="text-right" colspan="1">
			            	<b>{{ number_format(($total_patrimonial_services + $total_patrimonial_materials), 2,",",".") }}</b>
			          	</td>
			       	</tr>
			    </tfoot>
			</table>
		</div>
    </div>
</div>