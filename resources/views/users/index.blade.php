@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Usuários
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_users" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">
							@permission('users.create')
				            	<a href="{{ route('users.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
				            @endpermission
						</th>
						<th data-width="5%" data-field="name" data-sortable="true" data-align="left">Usuários</th>
						<th data-field="email" data-sortable="true">E-mails</th>
						<th data-field="roles" data-sortable="false">Grupos</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($data as $key => $user)
				        <tr>
				            <td>
				                <a href="{{ route('users.edit',$user->id) }}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				            </td>
				            <td>{{ $user->name }}</td>
				            <td>{{ $user->email }}</td>
				            <td>
								@if(!empty($user->roles))
									@foreach($user->roles as $v)
										<label class="label label-success">{{ $v->display_name }}</label>
									@endforeach
								@endif
							</td>
				            <td>
				            	@permission('users.destroy')
	                        		<a href="javascript:;" onclick="onDestroy('{!! route('users.destroy', [$user->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
	                    		@endpermission
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection
