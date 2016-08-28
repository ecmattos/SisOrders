@if(Session::has('errors'))
  	<div class="alert alert-danger">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
      <strong>Ops ... </strong>
      <br>
      Identificamos o(s) problema(s) abaixo: 
      <br>
      <br>
      <ul>
        @foreach ($errors->all() as $message)
          <li>{{ $message }}</li>
        @endforeach
      </ul>
    </div>
@endif

@if(Session::has('flash_message_success'))
  	<div class="alert alert-success" role="alert" align="left">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_success') }}
  	</div>
@endif

@if(Session::has('flash_message_danger'))
  	<div class="alert alert-danger" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_danger') }}
  	</div>
@endif

@if(Session::has('flash_message_warning'))
  	<div class="alert alert-warning" role="alert" align="center">
  		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  		{{ Session::get('flash_message_warning') }}
      <p class="pull-right">
        <a class="btn btn-default" href="#">Link</a>
    </p>
  	</div>
@endif


@if(Session::has('flash_message_partner_destroy'))
    <div class="alert alert-danger" role="alert" align="left">
      {{ Session::get('flash_message_partner_destroy') }}
      <p class="pull-right">
         Recuperar ? 
        <a href="{!! route('partners.restore', ['id' => $partner->id]) !!}" class="btn btn-success">SIM</a>
        <a href="{!! route('partners.deleted', ['id' => $partner->id]) !!}" class="btn btn-danger">Não</a>
      </p>
    </div>
@endif

