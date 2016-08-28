@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Clientes - Tipo
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
	
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_client_typess" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('client_types.create')
			            	<a href="{{ route('client_types.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-field="code" data-sortable="true" data-align="left" data-width="15%">Código</th>
					<th data-field="description" data-sortable="true" data-align="left">Descrição</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($client_types as $client_type)
			        <tr>
			        	<td>
			        		@permission('client_types.edit')
                        		<a href="{!! route('client_types.edit', ['id' => $client_type->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
						</td>
			        	<td>{{ $client_type->code }}</td>
			        	<td>{{ $client_type->description }}</td>
			        	<td>
			        		@permission('client_types.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('client_types.destroy', [$client_type->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection