@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
      <h4>
        Equipamentos: Consulta
        <div class="btn-group btn-group-sm pull-right">
          <a class="btn btn-primary" href="{{ route('patrimonials') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
          </div>
        <hr class="hr-primary" />
      </h4>
  </div>

  <div class="col-sm-6">
    
    <div class="panel panel-success">
      <div class="panel-heading">
          <div class="panel-title pull-left">
             <b>{{ $patrimonial->code_client }} - {{ $patrimonial->patrimonial_sub_type->description }} {{ $patrimonial->patrimonial_brand->description }} {{ $patrimonial->patrimonial_model->description }} {{ $patrimonial->serial }}</b>
          </div>
          <div class="panel-title pull-right">
          </div>
          <div class="clearfix"></div>
      </div>

      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Proprietário</td>
                <td class="text-left"><a href="{!! route('clients.show', ['id' => $patrimonial->client_id]) !!}">{{ $patrimonial->client->code_mask }}</a><br>{{ $patrimonial->client->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Patrimônio</td>
                <td class="text-left">{{ $patrimonial->code_client }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Código</td>
                <td class="text-left">{{ $patrimonial->code }}</td>
              </tr>

              <tr>
                <td class="text-right">Tipo / Sub-Tipo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_type->description }} / {{ $patrimonial->patrimonial_sub_type->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Marca</td>
                <td class="text-left">{{ $patrimonial->patrimonial_brand->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Modelo</td>
                <td class="text-left">{{ $patrimonial->patrimonial_model->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Nr série</td>
                <td class="text-left">{{ $patrimonial->serial }}</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $patrimonial->comments }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
    @include('patrimonials.images')
  </div>

  <div class="col-sm-12">
    @include('patrimonials.orders')
  </div>

@endsection
  