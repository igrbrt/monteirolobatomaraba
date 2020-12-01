<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
        <meta name="keywords" content="monteiro, lobato, monteiro lobato, maraba, escola maraba, educacao infantil">
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::asset('favicon.ico')}}">

        <title>Monteiro Lobato</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500,700,900%7CMontserrat:300,400,500,600,700,800,900" rel="stylesheet">
        <!-- BEGIN VENDOR CSS-->
        <!-- font icons-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/fonts/feather/style.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/fonts/simple-line-icons/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/fonts/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/vendors/css/perfect-scrollbar.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/vendors/css/prism.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/vendors/css/switchery.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/vendors/css/chartist.min.css')}}">
        <!-- END VENDOR CSS-->
        <!-- BEGIN APEX CSS-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/bootstrap.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/bootstrap-extended.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/colors.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/components.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/themes/layout-dark.css')}}">
        <link rel="stylesheet" href="{{URL::asset('app-assets/css/plugins/switchery.css')}}">
        <!-- END APEX CSS-->
        <!-- BEGIN Page Level CSS-->
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/core/menu/horizontal-menu.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('app-assets/css/pages/dashboard1.css')}}">
        <!-- END Page Level CSS-->
        <!-- BEGIN: Custom CSS-->
        <link rel="stylesheet" href="{{URL::asset('app-assets/css/plugins/form-validation.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('assets/css/style.css')}}">
        <link rel="stylesheet" type="text/css" href="{{URL::asset('css/easy-loading.min.css')}}">
        <link rel="stylesheet" href="{{URL::asset('app-assets/vendors/css/sweetalert2.min.css')}}">

        <style>

            * {
                padding:0px;
                margin:0px;
            }

            body {
                font-family: 'Nunito';
                width: 100%;
                /* margin-bottom:50px; */
            }

            .cabecalho{
                /* background: #fff; */
                /* background-image: linear-gradient(120deg, #fdfbfb 0%, #ebedee 100%); */
                background-image: linear-gradient(to top,#f794a4 0%, #fdd6bd 100%);
                -webkit-box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
                -moz-box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
                box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
            }

            @media screen and (max-width: 1024px) {
                .rodape{
                    font-size: 12px;
                }
            }

            footer{
                background-image: linear-gradient(to top,#fdd6bd 0%, #f794a4 100%);
                -webkit-box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
                -moz-box-shadow: 0 3px 5px rgba(57, 63, 72, 0.3);
                box-shadow: 0 -3px 5px rgba(57, 63, 72, 0.3);
                color: #000;
                /* position: fixed; */
                bottom: 0px;
                left: 0px;
                right: 0px;
                margin-bottom: 0px;
            }

            .conteudo{
                display: flex;
                flex-direction: column;
                justify-content: center;
            }

            .horizontal-form-layout{
                width: 80%;
                align-self: center;
            }

            .invalido{
                color: #F55252 !important;
                border-color: #F55252 !important;
            }

            .invalido:focus{
                box-shadow: 0 0 6px #F55252 !important;
            }

            .valido{
                color: #40C057 !important;
                border-color: #40C057 !important;
            }

            .valido:focus{
                box-shadow: 0 0 6px #40C057 !important;
            }

            .logo_ml{
                height: 90px;
            }
            .itens_cabecalho{
                display: flex;
                flex-direction: row;
                justify-content: space-between;
            }
            .logo_pipa{
                height: 130px;
            }
            .desabilitado{
                pointer-events: none;
                touch-action: none;
            }
        </style>

        @yield('header') <!-- paginas especificas podem adicionar algo -->
        <title>@yield('titulo')</title>
        
    </head>
    <body class="antialiased"> <!--  background="{{URL::asset('app-assets/img/1.png')}}" -->

        @yield('cabecalho') <!-- comum para todas as paginas -->

        <div class="cabecalho">
            <div class="itens_cabecalho">
                <div class="pl-2 pt-2 pb-1">
                    <a class="logo-text" href="{{url('/')}}">
                        <div class="logo-img"><img class="logo_ml img-responsive" alt="Monteiro Lobato" title="Início" src="{{URL::asset('app-assets/img/logo.png')}}"></div>
                    </a>
                </div>
                <div class="pr-2">
                    <div class="text-right">
                        @if (Route::has('login'))
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="btn btn-info mt-1"><i class="icon-layers icons"></i> Painel</a>
                                        <a href="{{ url('/') }}" class="btn btn-primary mt-1"><i class="icon-home icons"></i> Início</a>
                                        <button type="submit" class="btn btn-danger mt-1"><i class="icon-logout icons"></i> Sair</a>
                                    @else
                                        <a href="{{ route('login') }}" class="btn text-white bg-danger bg-darken-2"><i class="icon-login icons"></i> Entrar</a>
                                    @endif
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="conteudo">

            @yield('conteudo') <!-- conteudo de cada pagina -->

        </div>

        <footer class="rodape d-flex flex-row justify-content-center mt-2">
            <div class="logo-img"><img class="logo_pipa img-responsive" alt="Monteiro Lobato" title="Monteiro Lobato" src="{{URL::asset('app-assets/img/pipa.png')}}"></div>
            <div class="d-flex flex-column align-items-center">
                <label class="col-form-label font-weight-bold">Instituto Educacional Monteiro Lobato</label>
                <label class="font-weight-bold">R. das Mangueiras, 390 - Marabá - Pará</label>
                <label class="font-weight-bold">68503-590</label>
                <label class="font-weight-bold">Fone: (94) 3324-1473</label>
                <label class="font-weight-bold">All Rights Reserved © <?php echo date("Y"); ?></label>
            </div>
        </footer>

        <button class="btn text-white bg-danger bg-darken-2 scroll-top" type="button"><i class="ft-arrow-up"></i></button>

        <!-- SCRIPTS -->
        <script type="text/javascript" src="{{URL::asset('app-assets/vendors/js/vendors.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/vendors/js/switchery.min.js')}}"></script>
        
        {{-- <script type="text/javascript" src="{{URL::asset('app-assets/vendors/js/chartist.min.js')}}"></script> --}}
        
        <script type="text/javascript" src="{{URL::asset('app-assets/js/core/app-menu.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/js/core/app.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/js/notification-sidebar.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/js/customizer.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/js/scroll-top.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/vendors/js/jqBootstrapValidation.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/js/form-validation.js')}}"></script>
        
        {{-- <script type="text/javascript" src="{{URL::asset('app-assets/js/dashboard1.js')}}"></script> --}}
        
        <script type="text/javascript" src="{{URL::asset('assets/js/scripts.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/jquery.mask.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('js/easy-loading.min.js')}}"></script>
        <script type="text/javascript" src="{{URL::asset('app-assets/vendors/js/sweetalert2.all.min.js')}}"></script>
        
        @yield('footer')

    </body>
</html>
