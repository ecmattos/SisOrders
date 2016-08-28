@extends('layouts.app')
 
@section('content')
	<div class="page-header text-primary">
	   	<h4>
	   		Grupo de Usuários: Consulta
	   		<div class="btn-group btn-group-sm pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        	</div>
	   		<hr class="hr-primary" />
	   	</h4>
	</div>

    <div class="col-sm-8">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    @permission('roles.edit')
                        <a href="{!! route('roles.edit', ['id' => $role->id]) !!}" type="button" rel="tooltip" title="Editar"><i class="fa fa-edit text-primary"></i></a>
                    @endpermission
                    <b>{{ $role->description }}</b>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                  
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-right" width="25%">Nome</td>
                                <td class="text-left">{{ $role->name }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Display name</td>
                                <td class="text-left">{{ $role->display_name }}</td>
                            </tr>

                            <tr>
                                <td class="text-right">Descrição</td>
                                <td class="text-left">{{ $role->description }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-4">
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <b>PERMISSOES</b>
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped">
                        <thead>
                  
                        </thead>
                        <tbody>
                            @if(!empty($rolePermissions))
                                @foreach($rolePermissions as $v)
                                    <tr>
                                       <td class="text-left">{{ $v->display_name }}</td>
                                    </tr>
                                @endforeach
                            @endif
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection