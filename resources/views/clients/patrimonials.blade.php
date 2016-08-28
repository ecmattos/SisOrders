<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>EQUIPAMENTOS</b>
    </div>
    <div class="panel-title pull-right">
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped" > 
        <thead>
          <tr>
            <th data-width="5%" data-field="code" data-sortable="true" data-align="right">Código</th>
            <th data-width="5%" data-field="code_client" data-sortable="true" data-align="right">Cód Cliente</th>
            <th data-width="5%" data-field="patrimonial_type_id" data-sortable="true">Tipo</th>
            <th data-field="description" data-sortable="true">Descrição</th>
          </tr>
        </thead>
        <tbody>
          @foreach($patrimonials as $patrimonial)
            <tr>
              <td>{{ $patrimonial->code }}</td>
              <td><a href="{!! route('patrimonials.show', [$patrimonial->id]) !!}">{!! $patrimonial->code_client !!}</a></td>
              <td>{{ $patrimonial->patrimonial_type->code }}</td>
              <td>{{ $patrimonial->patrimonial_sub_type->description }} {{ $patrimonial->patrimonial_brand->description }} {{ $patrimonial->patrimonial_model->description }} {{ $patrimonial->serial }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>