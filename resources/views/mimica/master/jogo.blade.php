<!DOCTYPE html>
<html lang="pt-br">

<head>
    @include('mimica.componentes.header')

    <meta name="robots" content="noindex, nofollow">
    <!-- App css -->
    <link href="{{ asset('template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css"
        id="light-style" />
    <link href="{{ asset('template/assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css"
        id="dark-style" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <style type="text/css">



        /* font-family: 'Open Sans', sans-serif;
font-family: 'Roboto', sans-serif; */

        .disabledElement {
            pointer-events: none;
            opacity: 0.6;
        }

        body.authentication-bg {
            background-color: #d6d6d6;
        }

        .text-underline {
            text-decoration: underline !important;
        }

        .bg-blue {
            background-color: #695cf3
        }

        .btn_border {
            box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0 !important;
        }

        body.authentication-bg {
            background-image: url(https://uniplay.com.br/template/assets/images/background-limpo.jpeg);
        }

    </style>
</head>

<!-- Menu configuracao do jogo -->
@include('mimica.componentes.menu')

<!-- Menu ajuda -->
@include('mimica.componentes.ajuda')

<body class="authentication-bg" data-layout="detached" data-layout-config='{"darkMode":false}'>

    <div class="container py-0">
        <div class="row justify-content-center">
            <div class="col-lg-3 pr-5">
                <!-- Game - master -->
                <ins class="adsbygoogle d-none d-sm-none d-md-block" style="display:block"
                    data-ad-client="ca-pub-8647056672216418" data-ad-slot="3613545751" data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});

                </script>
            </div>
            @yield('content')
            <div class="col-lg-3 pl-5">
                <!-- Game - master -->
                <ins class="adsbygoogle d-none d-sm-none d-md-block" style="display:block"
                    data-ad-client="ca-pub-8647056672216418" data-ad-slot="3613545751" data-ad-format="auto"
                    data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});

                </script>
            </div>
            <div class="col-lg-12 col-md-12 col-sm-12">
                <!-- Game - Footer card -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8647056672216418"
                    data-ad-slot="4403883249" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});
                </script>
            </div>
        </div>
    </div>
    <!-- end container -->

    <script src="{{ asset('template/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/loadingOverlay.js') }}"></script>
    <script src="{{ asset('template/assets/js/noSleep.js') }}"></script>

    @hasSection('js')
        @yield('js')
    @endif

    @hasSection('css')
        @yield('css')
    @endif

    @if (session()->exists('message'))
        <script>
            $(function() {
                var mensagem = "{{ session()->get('message') }}";
                var tipo = "{{ session()->get('status') }}";

                app.message("", mensagem, tipo, 3000);
            });

        </script>
    @endif

    <script>
        $(document).ready(function() {

            $('form').bind('submit', function() {
                $(".btn_post").LoadingOverlay("show");
            });

            $('#sound').click(function() {
                var check = $(this).prop('checked');
                if (!check) {
                    app.SoundOff();
                } else {
                    app.SoundOn();
                }
            });

            $("#theme").click(function() {
                var check = $(this).prop('checked');
                if (check) {
                    app.ThemeDarkOn();
                } else {
                    app.ThemeDarkOff();
                }
            });

            $(".btn_sair").click(function() {
                var refButton = $(this).attr('data-id');

                if (!confirm('Tem certeza que deseja sair da partida?')) {
                    return false;
                } else {
                    window.location.href = refButton;
                }
            });

            $(".btn_cancelar_ajuda").click(function() {
                app.DisabledAjuda();
                $("#modal_ajuda").modal("hide");
            });

            app.LoadSound();
            app.LoadThemeDark();

            var noSleep = new NoSleep();

            function enableNoSleep() {
                noSleep.enable();
                document.removeEventListener('touchstart', enableNoSleep, false);
            }
            // Enable wake lock.
            // (must be wrapped in a user input event handler e.g. a mouse or touch handler)
            document.addEventListener('touchstart', enableNoSleep, false);

        });

        function abrirModalAjuda() {
            $("#modal_ajuda").modal("show");
        }

        function fecharModalConfig() {
            $("#top-modal").modal("hide");
        }

    </script>

</body>

</html>
