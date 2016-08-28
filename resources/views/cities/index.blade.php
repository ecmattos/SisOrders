@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Cidades
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_citiess" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('cities.create')
			            	<a href="{{ route('cities.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-field="code" data-sortable="true" data-align="left" data-width="15%">UF</th>
					<th data-field="description" data-sortable="true" data-align="left">Descrição</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($cities as $city)
			        <tr>
			        	<td>
			        		@permission('cities.edit')
                        		<a href="{!! route('cities.edit', ['id' => $city->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
						</td>
			        	<td>{{ $city->state->code }}</td>
			        	<td>{{ $city->description }}</td>
			        	<td>
			        		@permission('cities.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('cities.destroy', [$city->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection