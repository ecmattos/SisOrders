@extends('home')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Equipamentos
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_patrimonials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">
							@permission('client_types.create')
				            	<a href="{{ route('patrimonials.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
				            @endpermission
			            </th>
						<th data-width="5%" data-field="code_client" data-sortable="true" data-align="right">Patrimônio</th>
						<th data-width="5%" data-field="code" data-sortable="true" data-align="right">Código</th>
						<th data-width="5%" data-field="patrimonial_type_id" data-sortable="true">Tipo</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-width="15%" data-field="client_id" data-sortable="true">Cliente</th>
						<th data-field="comments">Obs</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($patrimonials as $patrimonial)
				        <tr>
				            <td>
				                <a href="{!! route('patrimonials.edit', [$patrimonial->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				            </td>
				            <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{!! $patrimonial->code_client !!}</a></td>
				            <td>{{ $patrimonial->code }}</td>
				            <td>{{ $patrimonial->patrimonial_type->code }}</td>
				            <td>{{ $patrimonial->patrimonial_sub_type->description }} {{ $patrimonial->patrimonial_brand->description }} {{ $patrimonial->patrimonial_model->description }} {{ $patrimonial->serial }}</td>
				            <td><a href="{!! route('clients.show', [$patrimonial->client_id]) !!}">{{ $patrimonial->client->description_short }}</a></td>
				            <td>{{ $patrimonial->comments }}</td>
				            <td>
				            	<a href="javascript:;" onclick="onDestroy('{!! route('patrimonials.destroy', [$patrimonial->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection