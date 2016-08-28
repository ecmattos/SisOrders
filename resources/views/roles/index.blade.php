@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Grupos de Usuários
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	@if ($message = Session::get('success'))
		<div class="alert alert-success">
			<p>{{ $message }}</p>
		</div>
	@endif

	<div class="table-responsive">
		<table class="table table-bordered table-striped" id="table_roless" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('roles.create')
			            	<a href="{{ route('roles.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-field="name" data-sortable="true" data-align="left" data-width="15%">Grupos</th>
					<th data-field="description" data-sortable="true" data-align="left">Descrição</th>
					<th data-field="users" data-sortable="false" data-align="center" data-width="10%">Usuários</th>
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
				@foreach($roles as $role)
			        <tr>
			        	<td>
			        		@permission('roles.edit')
                        		<a href="{!! route('roles.edit', ['id' => $role->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
						</td>
			        	<td><a href="{!! route('roles.show', ['id' => $role->id]) !!}">{{ $role->name }}</a></td>
			        	<td>{{ $role->description }}</td>
			        	<td></td>
			        	<td>
			        		@permission('roles.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('roles.destroy', [$role->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
			       		</td>
			        </tr>
			    @endforeach
			</tbody>
		</table>
	</div>
	{!! $roles->render() !!}
@endsection