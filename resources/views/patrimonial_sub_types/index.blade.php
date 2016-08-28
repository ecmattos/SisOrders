@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Equipamentos - Sub-Tipos
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
	
	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_$patrimonial_sub_typess" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('patrimonial_sub_types.create')
			            	<a href="{{ route('patrimonial_sub_types.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-field="code" data-sortable="true" data-align="left" data-width="15%">Código</th>
					<th data-field="description" data-sortable="true" data-align="left">Descrição</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($patrimonial_sub_types as $patrimonial_sub_type)
			        <tr>
			        	<td>
			        		@permission('patrimonial_sub_types.edit')
                        		<a href="{!! route('patrimonial_sub_types.edit', ['id' => $patrimonial_sub_type->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
						</td>
			        	<td>{{ $patrimonial_sub_type->code }}</td>
			        	<td>{{ $patrimonial_sub_type->description }}</td>
			        	<td>
			        		@permission('patrimonial_sub_types.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('patrimonial_sub_types.destroy', [$patrimonial_sub_type->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
@endsection