@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Estados
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_statess" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('states.create')
			            	<a href="{{ route('states.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-field="code" data-sortable="true" data-align="left" data-width="15%">Código</th>
					<th data-field="description" data-sortable="true" data-align="left">Descrição</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($states as $state)
			        <tr>
			        	<td>
			        		@permission('states.edit')
                        		<a href="{!! route('states.edit', ['id' => $state->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
						</td>
			        	<td>{{ $state->code }}</td>
			        	<td>{{ $state->description }}</td>
			        	<td>
			        		@permission('states.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('states.destroy', [$state->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection