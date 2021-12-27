<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="utf-8" />
    <title> @yield('title') | Mimicas Administrativo</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- App css -->
    <link href="{{ asset('template/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('template/assets/css/app-creative.min.css') }}" rel="stylesheet" type="text/css" id="light-style" />
    <link href="{{ asset('template/assets/css/app-creative-dark.min.css') }}" rel="stylesheet" type="text/css" id="dark-style" />
    <link href="{{ asset('template/assets/css/vendor/summernote-bs4.css') }}" rel="stylesheet" type="text/css" />

    
    <link href="{{ asset('template/assets/css/snackbar.css') }}" rel="stylesheet" type="text/css" id="light-style" />

    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>

<body class="loading" data-layout="detached"
    data-layout-config='{"layoutBoxed":false, "leftSidebarCondensed":false, "leftSidebarScrollable":false, "darkMode":false, "showRightSidebarOnStart": false}'>
    
    <div id="snackbar"></div>
    <!-- Topbar Start -->
    <div class="navbar-custom topnav-navbar topnav-navbar-dark">
        <div class="container-fluid">
            <a href="index.html" class="topnav-logo">
                <span class="topnav-logo-lg">
                    <img src="{{ asset('template/assets/images/logo-light.png') }}" alt="" height="16">
                </span>
                <span class="topnav-logo-sm">
                    <img src="{{ asset('template/assets/images/logo_sm.png') }}" alt="" height="16">
                </span>
            </a>

            <ul class="list-unstyled topbar-right-menu float-right mb-0">

                <li class="dropdown notification-list">
                    <a class="nav-link dropdown-toggle nav-user arrow-none mr-0" data-toggle="dropdown"
                        id="topbar-userdrop" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="account-user-avatar">
                            <img src="{{ asset('template/assets/images/users/avatar-1.jpg') }}" alt="user-image"
                                class="rounded-circle">
                        </span>
                        <span>
                            <span class="account-user-name">{{ Auth::user()->name }}</span>
                            <span class="account-position">Admin</span>

                        </span>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right dropdown-menu-animated topbar-dropdown-menu profile-dropdown"
                        aria-labelledby="topbar-userdrop">
                        <!-- item-->
                        <div class=" dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Bem vindo ! {{ date('d/m/Y H:m') }} </h6>
                        </div>

                        <!-- item-->
                        <a href="javascript:void(0);" class="dropdown-item notify-item">
                            <i class="mdi mdi-account-circle mr-1"></i>
                            <span>Meus dados</span>
                        </a>

                        <!-- item-->
                        <a href="{{ route('admin.logout')}}" class="dropdown-item notify-item">
                            <i class="mdi mdi-logout mr-1"></i>
                            <span>Sair</span>
                        </a>

                    </div>
                </li>

            </ul>
            <a class="button-menu-mobile disable-btn">
                <div class="lines">
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </a>
        </div>
    </div>
    <!-- end Topbar -->

    <!-- Start Content-->
    <div class="container-fluid">

        <!-- Begin page -->
        <div class="wrapper">

            <!-- ========== Left Sidebar Start ========== -->
            <div class="left-side-menu left-side-menu-detached">

                <div class="leftbar-user">
                    <a href="javascript: void(0);">
                        <img src="{{ asset('template/assets/images/users/avatar-1.jpg') }}" alt="user-image"
                            height="42" class="rounded-circle shadow-sm">
                        <span class="leftbar-user-name"> {{ Auth::user()->name }}</span>
                        <span class="text-sm text-muted">
                            {{ Auth::user()->email }}
                        </span>

                    </a>
                </div>

                <!--- Sidemenu -->
                <ul class="metismenu side-nav">

                    <li class="side-nav-title side-nav-item">Módulos</li>

                    <li class="side-nav-item">
                        <a href="{{ route('admin.dashboard') }}" class="side-nav-link">
                            <i class="mdi mdi-chart-timeline-variant"></i>
                            <span> Dashboard </span>
                        </a>
                    </li>
                    <li class="side-nav-item">
                        <a href="{{ route('admin.blog.index') }}" class="side-nav-link">
                            <i class=" mdi mdi-blogger"></i>
                            <span> Blog </span>
                        </a>
                    </li>
                
                    <li class="side-nav-title side-nav-item">Configurações</li>

                    <li class="side-nav-item">
                        <a href="javascript: void(0);" class="side-nav-link">
                            <i class="uil-package"></i>
                            <span> Cadastros </span>
                            <span class="menu-arrow"></span>
                        </a>
                        <ul class="side-nav-second-level" aria-expanded="false">
                            <li>
                                <a href="{{ route('admin.idioma.index') }}">Idiomas</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.categoria.index') }}">Categorias</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.equipe.index') }}">Equipes</a>
                            </li>
                            <li>
                                <a href="{{ route('admin.carta.index') }}">Cartas</a>
                            </li>
                        </ul>
                    </li>

                </ul>
                <!-- End Sidebar -->

                <div class="clearfix"></div>
                <!-- Sidebar -left -->

            </div>
            <!-- Left Sidebar End -->

            <div class="content-page">
                <div class="content">

                    <!-- start page title -->
                    @yield('content')
                    <!-- end page title -->

                </div> <!-- End Content -->
                
                <!-- Footer Start -->
                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-md-6">
                                2020 © Mimicando - games.com.br
                            </div>
                            <div class="col-md-6">
                                <div class="text-md-right footer-links d-none d-md-block">
                                    <a href="javascript: void(0);">About</a>
                                    <a href="javascript: void(0);">Support</a>
                                    <a href="javascript: void(0);">Contact Us</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
                <!-- end Footer -->

            </div> <!-- content-page -->

        </div> <!-- end wrapper-->
    </div>
    <!-- END Container -->

    <div class="rightbar-overlay"></div>
    <!-- /Right-bar -->

    <!-- bundle -->
    <script src="{{ asset('template/assets/js/vendor.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/app.min.js') }}"></script>

    {{-- <script src="{{ asset('template/assets/js/vendor/simplemde.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/vendor/demo.simplemde.js') }}"></script>
     --}}
    <script src="{{ asset('template/assets/js/vendor/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('template/assets/js/vendor/demo.summernote.js') }}"></script>

    <script>
        function Message(mensagem) 
        {
            $snackbar = $("#snackbar");
            $snackbar.html(mensagem);
            $snackbar.addClass('show');
            setTimeout(function () { $snackbar.removeClass("show"); }, 3000);
        }
    </script>
 
    @hasSection ('js')
        @yield('js')
    @endif

    @if (session()->exists('message'))
        <script>
            $(function() {
                var mensagem = " {{ session()->get('message') }}";
                Message(mensagem);
            });
        </script>
    @endif
  
</body>
</html>
