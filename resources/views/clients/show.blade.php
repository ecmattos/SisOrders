@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
      <h4>
        Clientes: Consulta
        <div class="btn-group btn-group-sm pull-right">
          <a class="btn btn-primary" href="{{ route('clients.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
          </div>
        <hr class="hr-primary" />
      </h4>
  </div>

  <div class="col-sm-6">
    <div class="panel panel-success">
      <div class="panel-heading">
        <div class="panel-title pull-left">
            <b>{{ $client->code_mask }} - {{ $client->description }}</b>
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
                <td class="text-right" width="25%">Nome Fantasia</td>
                <td class="text-left">{{ $client->description_short }}</td>
              </tr>
              
              <tr>
                <td class="text-right">Endereço</td>
                <td class="text-left">{{ $client->address }}</td>
              </tr>

              <tr>
                <td class="text-right">Bairro</td>
                <td class="text-left">{{ $client->neighborhood }}</td>
              </tr>

              <tr>
                <td class="text-right">Cidade</td>
                <td class="text-left">{{ $client->city->description }} / {{ $client->city->state->code }}</td>
              </tr>

              <tr>
                <td class="text-right">CEP</td>
                <td class="text-left">{{ $client->zip_code_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Telefone</td>
                <td class="text-left">{{ $client->phone_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">Celular</td>
                <td class="text-left">{{ $client->mobile_mask }}</td>
              </tr>

              <tr>
                <td class="text-right">E-mail</td>
                <td class="text-left">{{ $client->email }}</td>
              </tr>

              <tr>
                <td class="text-right">Observações</td>
                <td class="text-left">{{ $client->comments }}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

  <div class="col-sm-6">
  	@include('clients.contracts')    
  </div>

  <div class="col-sm-12">
    @include('clients.patrimonials')
  </div>

@endsection
  