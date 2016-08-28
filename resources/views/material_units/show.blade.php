@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
      <h4>
        Materiais - Unidades: Consulta
        <div class="btn-group btn-group-sm pull-right">
          <a class="btn btn-primary" href="{{ route('material_units') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
          </div>
        <hr class="hr-primary" />
      </h4>
  </div>

  	<div class="row">
    	<div class="col-sm-8">
      		<div class="table-responsive">
      			<table class="table table-bordered table-striped">
          			<thead>
           				<th class="text-center" colspan="2"><h3><b>{{ $material_unit->code }} - {{ $material_unit->description }}</b></h3></th>
          			</thead>
          			<tbody>
          				<tr>
           					<td class="text-right" width="25%">Código</td>
           					<td class="text-left">{{ $material_unit->code }}</td>
            			</tr>

        				<tr>
             				<td class="text-right">Descrição</td>
             				<td class="text-left">{{ $material_unit->description }}</td>
           				</tr>
          			</tbody>
        		</table>
      		</div>
    	</div>
    	<div class="col-sm-4">
    		@if(count($logs)>0)
         @include('revisionable.logs_register')
        @endif
    	</div>
    </div>
	    
@endsection
  