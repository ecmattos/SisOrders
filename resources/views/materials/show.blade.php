@extends('layouts.app')

@section('content')

	<div class="page-header text-primary">
   	<div class="page-header text-primary">
      <h4>
        Materiais: Consulta
        <div class="btn-group btn-group-sm pull-right">
          <a class="btn btn-primary" href="{{ route('materials') }}" rel="tooltip" title="Voltar"><i class="fa fa-arrow-left"></i></a>
        </div>
        <hr class="hr-primary" />
      </h4>
  </div>

  <div class="col-sm-8">
    <div class="panel panel-success">
      <div class="panel-heading">
        <h3 class="panel-title">
          <a href="{!! route('materials.edit', ['id' => $material->id]) !!}" type="button" class="round round-sm hollow blue" rel="tooltip" title="Editar"><i class="fa fa-edit"></i></a>
          <b>{{ $material->code }} - {{ $material->description }}</b>
        </h3>
      </div>
      <div class="panel-body">
        <div class="table-responsive">
          <table class="table table-bordered table-striped">
            <thead>
              
            </thead>
            <tbody>
              <tr>
                <td class="text-right" width="25%">Código</td>
                <td class="text-left">{{ $material->code }}</td>
              </tr>

              <tr>
                <td class="text-right">Descrição</td>
                <td class="text-left">{{ $material->description }}</td>
              </tr>

              <tr>
                <td class="text-right">Estoque</td>
                <td class="text-left">{{ $material->material_unit->code }} ({{ $material->material_unit->description }})</td>
              </tr>

              <tr>
                <td class="text-right">Unidade</td>
                <td class="text-left">{{ $material->material_unit->code }} ({{ $material->material_unit->description }})</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>

 
@endsection

@section('js_scripts')
  <script type="text/javascript">
    $(document).on('click', '.panel-heading span.panel-clickable', function(e)
      {
          var $this = $(this);
        if(!$this.hasClass('panel-collapsed')) 
          {
            $this.parents('.panel').find('.panel-body').slideUp();
            $this.addClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-up').addClass('fa fa-chevron-down');
          } 
        else 
          {
            $this.parents('.panel').find('.panel-body').slideDown();
            $this.removeClass('panel-collapsed');
            $this.find('i').removeClass('fa fa-chevron-down').addClass('fa fa-chevron-up');
          }
      })
  </script>
@endsection
  