@extends('layouts.app')

@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Materiais
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>
				
	<div class="col-lg-12">
        <div class="table-responsive">
        	<table class="table table-bordered table-striped" id="table_materials" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
				<thead>
					<tr>
						<th data-width="1%" class="text-center">
							@permission('materials.create')
				            	<a href="{!! route('materials.create') !!}" type="button" rel="tooltip" title="Incluir"><i class="fa fa-file-o"></i></a>
				            @endpermission
						</th>
						<th data-width="5%" data-field="code" data-sortable="true" data-align="right">Código</th>
						<th data-field="description" data-sortable="true">Descrição</th>
						<th data-width="10%" data-field="cost_value" data-align="right">Custo R$</th>
						<th data-width="10%" data-field="sale_value" data-align="right">Venda R$</th>
						<th data-width="10%" data-field="stock_qty" data-align="right">Estoque</th>
						<th data-width="5%" data-field="material_unit" data-align="right">Unidade</th>
						<th data-width="1%" class="text-center">#</th>
					</tr>
				</thead>
				<tbody>
				    @foreach($materials as $material)
				        <tr>
				            <td>
				                @permission('materials.edit')
					            	<a href="{!! route('materials.edit', [$material->id]) !!}" type="button" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
					            @endpermission
				            </td>
				            <td>{{ $material->code }}</td>
				            <td>{{ $material->description }}</td>
				            <td>{{ number_format($material->cost_value, 2,",",".") }}</td>
				            <td>{{ number_format($material->sale_value, 2,",",".") }}</td>
				            <td>{{ number_format($material->stock_qty, 2,",",".") }}</td>
				            <td>{{ $material->material_unit->code }}</td>
				            <td>
				            	@permission('materials.destroy')
					            	<a href="javascript:;" onclick="onDestroy('{!! route('materials.destroy', [$material->id]) !!}')" id="link_delete" type="button" rel="tooltip" title="Excluir"><i class="fa fa-trash-o text-danger"></i></a>
					            @endpermission
				            </td>
				        </tr>
				    @endforeach
			    </tbody>
			</table>
		</div>
	</div>
@endsection