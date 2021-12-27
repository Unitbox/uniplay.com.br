@extends('mimica.master.web')
@section('robots', 'index, follow')
@section('title', 'Jogo educativo que permite trabalhar a criatividade, motricidade e interação social.')

@section('content')
    <section class="pb-3">
        <div class="container ">
            <div class="form-row pt-2">
                <div class="form-group col-md-6 mx-auto text-center mb-0 pb-0">
                    <ol class="breadcrumb d-flex justify-content-center">
                        <li class="breadcrumb-item"><a href="{{ route('mimica.home') }}" class="text-underline"> 
                            <span class="text-underline "><i class="mdi mdi-home-outline text-underline "></i></span> Página do
                                jogo</a></li>
                        <li class="breadcrumb-item active">Blog</li>
                    </ol>
                    <span class="h2 d-block font-tema text-success" style="letter-spacing: 0.1rem;">CONHEÇA NOSSO
                        BLOG</span>
                    <span class="h5 font-weight-light d-block mb-4">Informações e dicas para te ajudar</span>

                    <form id="form_blog" method="POST" action="{{ route('mimica.blog.search') }}" novalidate="novalidate">
                        @csrf
                        <div class="input-group input-group-lg mb-3">
                            <input name="pesquisa_post" id="pesquisa_post" type="text" class="form-control"
                                style="font-weight: 300; border: solid 1px #18157c; border-right: 0;"
                                placeholder="Pesquise um artigo">

                            <div class="input-group-append">
                                <button class="btn bg-white text-purple"
                                    style="border: solid 1px #18157c; border-left: 0 !important;"><i
                                        class="dripicons-search "></i></button>
                            </div>
                        </div>
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                @foreach ($errors->all() as $error)
                                    {{ $error }}
                                @endforeach
                            </div>
                        @endif
                        @if (!empty($resultado))
                        <span class="small font-weight-light">Resultado da busca por "{{ $resultado }}"</span>
                    @endif
                    </form>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 bg-light" style="min-height: 300px;">
        <div class="container">
            {{-- <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <h1 class="mt-0 text-yellow" style="font-size: 80px;"><i class="mdi mdi-lightbulb-on-outline"></i>
                        </h1>
                        <h2 class="font-tema text-success" style="letter-spacing: 0.2rem;">TUTORIAIS </h2>
                        
                    </div>
                </div>
            </div> --}}
            <!-- conteudo -->
            <div class="row">
                @if ($posts->isEmpty())
                    <div class="col-md-12 mb-4 text-center">
                        <small class="">NENHUM RESULTADO ENCONTRADO</small> <br>
                        <a href="{{ route('mimica.blog') }}"><span> <i class=" dripicons-chevron-left"></i></span> voltar para os posts</a>
                    </div>
                @else
                    @foreach ($posts as $post)
                        <div class="col-md-4">
                            <div class="card card-artigo shadow" style="border-radius: 20px;">

                                <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}"
                                    class="text-underline blog-link">
                                    <img class="card-img-top" src="{{ $post->img_background }}" alt="Card image cap"
                                        style="border-radius: 20px 20px 0px 0px" class="card-img-top"> </a>
                                <div class="card-body ">
                                    <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}">
                                        <h4 class="text-dark text-italic text-underline blog-title"
                                            style="text-decoration: black">{{ $post->titulo }}</h4>
                                    </a>
                                    <h6 class="card-subtitle mb-2 text-muted font-weight-light">
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
            <!-- // fim -->

        </div>
    </section>

@endsection
@section('js')

    <script>
        $(document).ready(function() {

            //    $(".blog-link").hover(
            //         function() {
            //             $(this).addClass('cursor-pointer').addClass('shadow');
            //         },
            //         function() {
            //             $(this).removeClass('cursor-pointer').removeClass('shadow');
            //         }
            //     )
            // .click(function() {

            //     const card = $(this);
            //     const action = card.attr('data-id');

            //     window.location.href = action;
            // });

        });

    </script>


@endsection
