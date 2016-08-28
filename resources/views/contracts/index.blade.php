@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Contratos
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="table-responsive">
        <table class="table table-bordered table-striped" id="table_contracts" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('contracts.create')
			            	<a href="{{ route('contracts.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-width="10%" data-field="code" data-sortable="true">Código</th>
					<th data-field="description" data-sortable="true">Descrição</th>
					<th data-width="10%" data-field="client_id" data-sortable="true">Cliente</th>
					<th data-width="7%" data-field="manager_id">Gestor</th>	
					<th data-width="13%" data-field="date">Validade</th>
					<th data-align="right" data-width="5%" data-field="factor_material">Fator Materiais</th>
					<th data-align="right" data-width="5%" data-field="factor_service">Fator Serviços</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($contracts as $contract)
			        <tr>
			            <td>
			                @permission('contracts.edit')
                        		<a href="{!! route('contracts.edit', ['id' => $contract->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
			            </td>
			            <td><a href="{!! route('contracts.show', ['id' => $contract->id]) !!}">{{ $contract->code }}</a></td>
			            <td>{{ $contract->description }}</td>
			            <td><a href="{!! route('clients.show', ['id' => $contract->client_id]) !!}">{{ $contract->client->description_short }}</a></td>
			            <td>{{ $contract->manager->name }}</td>
			            <td>{{ isset($contract->date_start) ? $contract->date_start->format('d/m/Y') : null }} a {{ isset($contract->date_end) ? $contract->date_end->format('d/m/Y') : null }}</td>
			            <td>{{ number_format($contract->factor_material, 2,",",".") }}</td>
			            <td>{{ number_format($contract->factor_service, 2,",",".") }}</td>
			            <td>
			            	@permission('contracts.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('contracts.destroy', [$contract->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
				        </td>
				    </tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection