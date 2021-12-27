@extends('mimica.master.web')
@section('robots', 'index, follow')
@section('title', 'Jogo educativo que permite trabalhar a criatividade, motricidade e interação social.')
@section('content')

@section('css')
    <style>
        .section-artigo p {
            font-size: 1.3rem !important;
            margin: 0 !important;
        }

        .section-artigo h4 {
            font-size: 1.3rem !important;
            margin: 0 !important;
        }

        .opacity {
            opacity: .5 !important;
        }

        .card-artigo img {
            border-bottom: solid 1px #f1f1f1;
        }

        .card-artigo img:hover {
            border-bottom: solid 1px #6f42c1;
        }

        .blog-content {
            font-weight: 300 !important;
        }

        .blog-content .h4,
        h4 {
            opacity: .9;
            font-weight: 300 !important;
        }

        .blog-content .h1,
        h1 {
            font-weight: 900 !important;
        }

        .blog-content .h2,
        h2 {
            font-weight: 500 !important;
        }

        .blog-content .h5,
        h5 {
            font-weight: 300 !important;
        }

        .blog-content p {
            font-weight: 300 !important;
        }

        .blog-content img {
            border-radius: 10px;
            width: 100%;
        }
        .blog-content ul li {
            font-weight: 300 !important;
        }

    </style>
@endsection

<section class="pt-1 pb-3 bg-blue text-white px-3 section-artigo cta-back"
    style="min-height: 250px; position: relative; z-index: 998">
    <div class="container">
        <div class="row pt-2">
            <div class="col-md-8 mx-auto">
                <ol class="breadcrumb d-flex justify-content-center">
                    <li class="breadcrumb-item text-success"><a href="{{ route('mimica.home') }}"
                            class="text-white text-underline"><span class="text-underline "><i class="mdi mdi-home-outline text-underline "></i> Página do jogo</a></li>
                    <li class="breadcrumb-item text-success"><a href="{{ route('mimica.blog') }}"
                            class="text-white text-underline ">blog</a></li>
                    <li class="breadcrumb-item active">Artigo</li>
                </ol>
                <span class="h4 d-block text-center font-weight-bold">{{ $artigo->tipo }}</span>
                <span class="text-center d-block h1 blog-title font-weight-bold text-center text-success"
                    style="font-size: 45px">{{ $artigo->titulo }}
                </span>
                <span class="text-center d-block h3 font-weight-bold text-center text-white lead" >{{ $artigo->subtitulo }}
                </span>
            </div>
            <div class="col-md-8 mx-auto">
                <span class="h5 d-block small text-center" style="font-weight: 300"><span class="autor">
                        {{ $artigo->autor }}
                    </span>
                    <span class="data mb-3">
                        {{ date('d/m/Y H:i', strtotime($artigo->created_at)) }}</span>
                    <br>
                    <br>
                    <span class="visualizacao mt-5">
                        <i class="uil uil-comments-alt"></i> {{ $artigo->quantidade_acesso }}
                        visualizações</span>
                </span>
                </span>

                <br>

            </div>
        </div>
    </div>
</section>
<div class="container-fluid px-0 mx-0">
    <section class="py-4 bg-white text-dark px-3 section-artigo" style="min-height: 300px; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto blog-content py-3">
                    {!! $artigo->conteudo !!}
                </div>
            </div>
        </div>
    </section>

    <section class="py-4 bg-light text-dark px-3" style="min-height: 300px; position: relative;">
        <div class="container">
            <h3 class="text-center pb-4 blog-title font-weight-bold text-success">Você pode gostar também</h3>
            <div class="row">
                @if ($posts->isEmpty())
                    <div class="col-md-12 mb-4 text-center">
                        <small class="">NENHUM RESULTADO ENCONTRADO</small>
                    </div>
                @else
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card card-artigo" style="border-radius: 20px;">
                                <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}"
                                    class="text-underline blog-link">
                                    <img class="card-img-top" src="{{ $post->img_background }}" alt="Card image cap"
                                        style="border-radius: 20px 20px 0px 0px"> </a>
                                <div class="card-body ">
                                    <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}">
                                        <h4 class="text-dark text-italic text-underline blog-title"
                                            style="text-decoration: black">{{ $post->titulo }}</h4>
                                    </a>
                                    <h6 class="card-subtitle mb-2 mt-1 text-muted font-weight-light">
                                        {{ date('d/m/Y H:i', strtotime($post->created_at)) }}</h6>
                                    <p class="card-text font-weight-light"> {{ $post->subtitulo }}
                                    </p>
                                    <hr class="m-0">
                                    <div class="row">
                                        <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                                class="uil uil-comments-alt"></i> {{ $post->quantidade_acesso }}
                                            visualizações</a>
                                        <a href="https://wa.me/?text={{ $post->titulo }} {{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}"
                                            target="_blank" class="btn btn-sm btn-link text-muted test"><i
                                                class="uil uil-share-alt"></i>
                                            Compartilhe</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>


        </div>
    </section>

    <script>
        // ------------------- //
        // Custom Page Script  //
        // ------------------- //      
        var page = (function() {

            function init() {

                jQuery(".nav-item-blog").addClass("active");

            }

            return {
                init: init
            };
        }());

    </script>

</div>
@endsection
