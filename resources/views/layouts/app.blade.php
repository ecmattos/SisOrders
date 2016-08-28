<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Laravel</title>
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700" rel="stylesheet">
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-dialog.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/bootstrap-table.css') }}" rel="stylesheet">
    <link href="{{ asset('css/select2.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/daterangepicker.css') }}" rel="stylesheet">
    <link href="{{ asset('css/jquery-ui.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">

</head>
<body id="app-layout">
    <div class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">SiGeS</a>
            </div>
            <div class="collapse navbar-collapse">
                <ul class="nav navbar-nav navbar-right">
                    @if (Auth::guest())
                            <li><a href="{{ url('/login') }}">Entrar</a></li>
                            <li><a href="{{ url('/register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Sair</a></li>
                                </ul>
                            </li>
                        @endif
                </ul>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cadastro <b class="caret"></b></a>
                        <ul class="dropdown-menu multi-level">
                            <li><a href="/clients">Clientes</a></li>
                            <li><a href="/patrimonials">Equipamentos</a></li>
                            <li><a href="/materials">Materiais</a></li>
                            <li><a href="/services">Serviços</a></li>
                            <li><a href="/contracts">Contratos</a></li>
                            
                            <li><a href="#">Another action</a></li>
                            <li><a href="#">Something else here</a></li>
                            <li class="divider"></li>
                            <li><a href="#">Separated link</a></li>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Action</a></li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">One more separated link</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Administração <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acessibilidade</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/users">Usuários</a></li>
                                    <li><a href="/roles">Grupos</a></li>
                                </ul>
                            </li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Clientes</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/client_types">Tipos</a></li>
                                </ul>
                            </li>
                            <li><a href="/states">Estados</a></li>
                            <li><a href="/cities">Cidades</a></li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Materiais</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/material_units">Unidades</a></li>
                                </ul>
                            </li>
                            <li class="divider"></li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Equipamentos</a>
                                <ul class="dropdown-menu">
                                    <li><a href="/patrimonial_types">Tipos</a></li>
                                    <li><a href="/patrimonial_sub_types">Sub-Tipos</a></li>
                                    <li><a href="/patrimonial_brands">Marcas</a></li>
                                    <li><a href="/patrimonial_models">Modelos</a></li>
                                </ul>
                            <li class="divider"></li>
                            <li><a href="#">One more separated link</a></li>
                            <li class="dropdown-submenu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acessibilidade</a>
                                <ul class="dropdown-menu">
                                    <li><a href="#">Usuários</a></li>
                                    <li><a href="#">Grupos</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                    <li class="divider"></li>
                                    <li class="dropdown-submenu">
                                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Acessibilidade</a>
                                        <ul class="dropdown-menu">
                                            <li class="dropdown-submenu">
                                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown</a>
                                                <ul class="dropdown-menu">
                                                    <li><a href="#">Action</a></li>
                                                    <li><a href="#">Another action</a></li>
                                                    <li><a href="#">Something else here</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">Separated link</a></li>
                                                    <li class="divider"></li>
                                                    <li><a href="#">One more separated link</a></li>
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div><!--/.nav-collapse -->
        </div>
    </div>

    <div class="container-fluid">
        @include('common.flash')
        @yield('content')
        <hr class="hr-primary" />
    </div>

    <!-- JavaScripts -->
    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <script src="{{ asset('js/bootstrap-table.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-toolbar.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-filter.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-filter-control.js') }}"></script>

    <script src="{{ asset('js/bootstrap-table-multiple-search.js') }}"></script>
    
    <script src="{{ asset('js/bootstrap-table-export.js') }}"></script>
    <script src="{{ asset('js/bootstrap-table-pt-BR.js') }}"></script>
    <script src="{{ asset('js/tableExport.js') }}"></script>

    <script src="{{ asset('js/bootstrap-dialog.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <script src="{{ asset('js/price_format.js') }}"></script>
    <script src="{{ asset('js/daterangepicker.js') }}"></script>
    <script src="{{ asset('js/jquery-ui.min.js') }}"></script>

    <script>
        function onDestroy(url)
            {
                BootstrapDialog.confirm(
                    {
                        title: 'Confirmar exclusão',
                        message: 'Deseja realmente EXCLUIR este registro ?\n\n\n\nNão se preocupe pois caso existam restrições, esta operação será cancelada informando os motivos.',
                        type: BootstrapDialog.TYPE_DANGER, // <-- Default value is BootstrapDialog.TYPE_PRIMARY
                        closable: false, // <-- Default value is false
                        draggable: true, // <-- Default value is false
                        btnCancelLabel: 'Cancelar', // <-- Default value is 'Cancel',
                        btnOKLabel: 'EXCLUIR !', // <-- Default value is 'OK',
                        btnOKClass: 'btn-danger', // <-- If you didn't specify it, dialog type will be used,
                        callback: function(result) 
                        {
                            // result will be true if button was click, while it will be false if users close the dialog directly.
                            if(result) 
                            {
                                $(location).attr('href',url);
                            }
                        }
                    });
       
            }
    </script>

    <script>
        $(window).on('beforeunload', function () {
            $("input[type=submit], input[type=button]").prop("disabled", "disabled");
        });
    </script>

    <script type="text/javascript">
        $(document).ready(function ($) {
            $.datepicker.setDefaults
            ({
                dateFormat: 'dd/mm/yy',
                dayNames: ['Domingo','Segunda','Terça','Quarta','Quinta','Sexta','Sábado'],
                dayNamesMin: ['D','S','T','Q','Q','S','S'],
                dayNamesShort: ['Dom','Seg','Ter','Qua','Qui','Sex','Sáb'],
                monthNames: ['Janeiro','Fevereiro','Março','Abril','Maio','Junho','Julho','Agosto','Setembro','Outubro','Novembro','Dezembro'],
                monthNamesShort: ['Jan','Fev','Mar','Abr','Mai','Jun','Jul','Ago','Set','Out','Nov','Dez'],
                nextText: 'Próximo',
                prevText: 'Anterior',
                changeMonth: 'true',
                changeYear: 'true'
            });
        });
    </script>

    @yield('js_scripts')

</body>
</html>