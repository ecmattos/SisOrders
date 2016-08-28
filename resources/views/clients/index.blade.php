@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Clientes
	   		<div class="btn-group btn-group-sm pull-right">
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

	<div class="table-responsive">
        <table class="table table-bordered table-striped" id="table_clients" data-toggle="table" data-toolbar="#filter-bar" data-show-toggle="false" data-search="false" data-show-filter="true" data-show-columns="true" data-show-export="true" data-pagination="true" data-click-to-select="true" data-page-list="[10, 20, 50, 100, All]" data-toolbar="#filter-bar"> 
			<thead>
				<tr>
					<th data-width="1%" class="text-center">
						@permission('clients.create')
			            	<a href="{{ route('clients.create') }}" rel="tooltip" title="Novo"><i class="fa fa-file-o"></i></a>
			            @endpermission
	            	</th>
					<th data-field="code" data-sortable="true">CPF/CNPJ</th>
					<th data-field="description" data-sortable="true">Razão Social</th>
					<th data-field="description_short" data-sortable="true">Fantasia</th>
					<th data-field="address">Endereço</th>
					<th data-field="neighborhood">Bairro</th>
					<th data-field="city_id" data-sortable="true">Cidade/UF</th>
					<th data-field="zip_code">CEP</th>
					<th data-field="contact">Contato</th>
					<th data-field="phone">Fone</th>
					<th data-field="mobile">Celular</th>
					<th data-field="email" data-sortable="true">E-mail</th>
					<th data-field="comments">Obs</th>		
					<th data-width="1%" class="text-center">#</th>
				</tr>
			</thead>
			<tbody>
			    @foreach($clients as $client)
			        <tr>
			            <td>
			                @permission('clients.edit')
                        		<a href="{!! route('clients.edit', ['id' => $client->id]) !!}" rel="tooltip" title="Alterar"><i class='fa fa-edit'></i></a>
                    		@endpermission
			            </td>
			            <td><a href="{!! route('clients.show', ['id' => $client->id]) !!}">{{ $client->code_mask }}</a></td>
			            <td>{{ $client->description }}</td>
			            <td>{{ $client->description_short }}</td>
			            <td>{{ $client->address }}</td>
			            <td>{{ $client->neighborhood }}</td>
			            <td>{{ $client->city->description }}/{{ $client->city->state->code }}</td>
			            <td>{{ $client->zip_code_mask }}</td>
			            <td>{{ $client->contact }}</td>
			            <td>{{ $client->phone_mask }}</td>
					    <td>{{ $client->mobile_mask }}</td>
					    <td>{{ $client->email }}</td>
					    <td>{{ $client->comments }}</td>
			            <td>
			            	@permission('clients.destroy')
                        		<a href="javascript:;" onclick="onDestroy('{!! route('clients.destroy', [$client->id]) !!}')" id="link_delete" type="button" class="round round-sm hollow red"><i class="fa fa-trash-o text-danger"></i></a>
                    		@endpermission
				        </td>
				    </tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection