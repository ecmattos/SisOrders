@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Serviços
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_services" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">
							<a href="{!! route('services.create') !!}" type="button" class="round round-sm hollow green" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
						</th>
						<th data-width="5%" data-field="code" data-sortable="true" data-align="right">Código</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-width="10%" data-field="cost_value" data-align="right">Custo R$</th>
						<th data-width="10%" data-field="sale_value" data-align="right">Venda R$</th>
						<th data-width="5%" data-field="unit" data-align="right">Unidade</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($services as $service)
				        <tr>
				            <td>
				                <a href="{!! route('services.edit', [$service->id]) !!}" type="button" class="round round-sm hollow blue"><i class="fa fa-edit"></i></a>
				            </td>
				            <td>{{ $service->code }}</td>
				            <td>{{ $service->description }}</td>
				            <td>{{ number_format($service->cost_value, 2,",",".") }}</td>
				            <td>{{ number_format($service->sale_value, 2,",",".") }}</td>
				            <td>{{ $service->unit }}</td>
				            <td>
				            	<a href="javascript:;" onclick="onDestroy('{!! route('services.destroy', [$service->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection