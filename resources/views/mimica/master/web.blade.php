<!DOCTYPE html>
<html lang="pt-BR">

<head>
    @include('mimica.componentes.header')
    <meta name="robots" content="@yield('robots')">
    <!-- App css -->
    <link href="{{ asset('template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css"
        id="light-style" />

    <style type="text/css">
        @import url('https://fonts.googleapis.com/css2?family=Fredoka+One&display=swap');

        .font-tema {
            font-family: 'Fredoka One', cursive;
        }

        .nav-link {
            color: #fff;
        }

        .bg-red {
            background-color: #FF2D73;
        }

        .bg-blue {
            background-color: #453ab7
        }

        .text-red {
            font-family: 'Fredoka One', cursive;
            letter-spacing: 1px;
            color: #FF2D73;
        }

        .text-green {
            font-family: 'Fredoka One', cursive;
            letter-spacing: 1px;
            color: #42d29d
        }

        .text-blog-blue {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif !important;
            color: #453ab7
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .blog-title {
            font-family: "Playfair Display", Georgia, "Times New Roman", serif !important
        }

        .text-underline {
            text-decoration: underline !important;
        }

        .nav-menu>a {
            font-size: 10px
        }

        html {
            scroll-behavior: smooth !important;
        }

        .bg-footer {
            background-color: #18157c;
        }

        .cookiealert {
            position: fixed;
            bottom: 0;
            left: 0;
            width: 100%;
            margin: 0 !important;
            z-index: 999;
            opacity: 0;
            visibility: hidden;
            border-radius: 0;
            transform: translateY(100%);
            transition: all 500ms ease-out;
            color: #090909;
            background: #fff;
            border-bottom-color: rgb(85, 85, 85);
        }

        /*
            * Inicio Cookie 
        */
        .cookiealert.show {
            opacity: 1;
            visibility: visible;
            transform: translateY(0%);
            transition-delay: 1000ms;
        }

        .cookiealert a {
            text-decoration: underline
        }

        .cookiealert .acceptcookies {
            margin-left: 10px;
            vertical-align: baseline;
        }

        .card-artigo .card-img-top {
            width: 100%;
            height: 240px;
            object-fit: cover;
            object-position: top;
            border-top-left-radius: 10px;
            border-top-right-radius: 10px;
        }

    </style>
</head>

<!-- Cookie do site -->
@include('mimica.componentes.cookie')

<body class="loading" data-layout-config='{"darkMode":false}'>
    <h1 style="display: none;">Mímicas com a galera</h1>
    <!-- NAVBAR START -->
    <nav class="navbar cta-back navbar-expand-lg py-1 bg-blue fixed-top">
        <div class="container p-0">
            <!-- logo -->
            <a href="{{ route('mimica.home') }}" class="navbar-brand mr-lg-5 p-0">
                <img src="{{ url('template/assets/images/logo_mimics_uniplay.png') }}" alt="logo-mimics-uniplay"
                    title="Mimics Arcade" class="logo-dark" style="width: 200px" />
            </a>

            <button class="navbar-toggler text-white" type="button" data-toggle="collapse"
                data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false"
                aria-label="Toggle navigation" style="border: 1px solid #eee !important;">
                <i class="mdi mdi-menu"></i>
            </button>

            <!-- menus -->
            <div class="collapse navbar-collapse row" id="navbarNavDropdown">
                <!-- left menu -->
                <ul class="navbar-nav ml-lg-auto ml-sm-5  mt-lg-0 font-tema " style="padding-left: 20px !important">
                    <li class="nav-item mx-lg-0 nav-menu">
                        <a class="nav-link text-white" href="{{ route('mimica.home') }}/#inicio"
                            style="letter-spacing: 1.0px; font-size:12px">INÍCIO</a>
                    </li>
                    <li class="nav-item mx-lg-0 nav-menu">
                        <a class="nav-link text-white" href="{{ route('mimica.home') }}/#comofunciona"
                            style="letter-spacing: 1.0px; font-size:12px">COMO FUNCIONA</a>
                    </li>
                    <li class="nav-item mx-lg-0">
                        <a class="nav-link text-white" href="{{ route('mimica.home') }}/#ranking"
                            style="letter-spacing: 1.0px;font-size:12px">RANKING</a>
                    </li>
                    <li class="nav-item mx-lg-0">
                        <a class="nav-link text-white" href="{{ route('mimica.blog') }}"
                            style="letter-spacing: 1.0px;font-size:12px">BLOG</a>
                    </li>
                    <li class="nav-item mx-lg-0">
                        <a class="nav-link text-white" href="{{ route('mimica.home') }}/#historia"
                            style="letter-spacing: 1.0px;font-size:12px">HISTÓRIA</a>
                    </li>
                    <li class="nav-item mx-lg-0">
                        <a class="nav-link text-white" href="{{ route('mimica.home') }}/#contribua"
                            style="letter-spacing: 1.0px;font-size:12px">CONTRIBUA</a>
                    </li>
                    <li class="nav-item mx-lg-0">
                        <a class="nav-link text-white" href="{{ route('mimica.home') }}/#inicio"
                            style="letter-spacing: 1.0px;font-size:12px">JOGAR AGORA</a>
                    </li>
                    <li class="ml-lg-0 nav-item nav-item-instagram active">
                        <a class="nav-link py-0 text-white" target="_blank"
                            href="https://www.instagram.com/mimicsarcade/">
                            <i class=" mdi mdi-instagram" style="font-size: 25px"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="mt-5">
        @yield('content')
    </div>

    <footer class="bg-footer py-5">
        <div data-nosnippet class="container">
            <div  class="row">
                <div class="col-lg-4">
                    <img src="{{ url('template/assets/images/logo_mimics_uniplay.png') }}" alt="logo-mimics-uniplay"
                        title="Mimics Arcade" class="logo-dark" style="width: 200px" />
                    <p class=" mt-4">Chame a galera para adivinhar personagens, <br /> musicas, séries e muito
                        mais.</p>
                </div>
                <div data-nosnippet class="col-lg-4 mt-3 mt-lg-0">
                    <h5 class="text-white">Fale Conosco</h5>
                    <ul class="list-unstyled pl-0 mb-0 mt-3">
                        <li class="mt-2">
                            <a href="mailto:contato@uniplay.com.br" class="text-white"> contato@uniplay.com.br </a>
                        </li>
                        <li class="mt-2"><a href="{{ route('mimica.privacidade') }}"
                                class="text-white-50">Política
                                de
                                privacidade</a></li>
                        <li class="mt-2"><a href="{{ route('mimica.termos') }}"
                                class="text-white-50">Termos de
                                uso</a></li>
                    </ul>
                </div>

                <div data-nosnippet class="col-lg-4 mt-3 mt-lg-0">
                    <h5 class="text-white">Nossas redes</h5>
                    <ul class="social-list list-inline mt-3">
                        <li class="list-inline-item text-center">
                            <a class="nav-link py-0 text-white" target="_blank"
                                href="https://www.instagram.com/mimicsarcade/">
                                <i class=" mdi mdi-instagram" style="font-size: 25px"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div data-nosnippet class="row">
                <div class="col-lg-12">
                    <div class="mt-5">
                        <p class="text-white font-weight-bold mt-4 text-center mb-0"><?php echo date('Y'); ?> © Mimicas
                            Online <br>
                            Feito com <i class="mdi mdi-cards-heart text-red"> </i>
                            por <a href="https://unitbox.com.br" class="text-success">unitbox.com.br</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    @hasSection('css')
        @yield('css')
    @endif

    <script src="{{ asset('template/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/scripts.js') }}"></script>
    <script src="{{ asset('template/assets/js/cookie.min.js') }}"></script>

    @section('js')

        <script>
            $(document).ready(function() {
                $.ajaxSetup({
                    headers: {
                        "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                    }
                });
            });
        </script>
    @endsection

    @hasSection('js')
        @yield('js')
    @endif
</body>

</html>
