<div class="panel panel-success">
  <div class="panel-heading">
    <div class="panel-title pull-left">
      <b>CONTRATOS</b>
    </div>
    <div class="panel-title pull-right">
    </div>
    <div class="clearfix"></div>
  </div>

  <div class="panel-body">
    <div class="table-responsive">
      <table class="table table-bordered table-striped">
        <thead>
          <tr>
            <th data-width="10%" data-field="code" data-sortable="true">Código</th>
            <th data-field="description" data-sortable="true">Descrição</th>
            <th data-width="7%" data-field="manager_id">Gestor</th> 
            <th data-width="13%" data-field="date">Validade</th>
          </tr>
        </thead>
        <tbody>
          @foreach($contracts as $contract)
            <tr>
              <td><a href="{!! route('contracts.show', ['id' => $contract->id]) !!}">{{ $contract->code }}</a></td>
              <td>{{ $contract->description }}</td>
              <td>{{ $contract->manager->name }}</td>
              <td>{{ $contract->date_start->format('d/m/Y') }} a {{ $contract->date_end->format('d/m/Y') }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

