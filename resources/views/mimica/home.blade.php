@extends('mimica.master.web')
@section('title', 'Chame a galera para adivinhar personagens, músicas, séries e muito mais.')
@section('robots', 'index, follow')

@section('content')
@section('css')

    <style type="text/css">
        .text-yellow {
            color: #F4C13F;
        }

        .cta-back {
            background-image: url('template/assets/images/bg-pattern-dark-mimics_uniplay.png');
            background-size: cover;
        }

        /* Small devices (landscape phones, 576px and up) */
        @media (min-width: 406px) and (max-width: 767px) {
            .hero_cel {
                display: block;
            }
        }

        /* // Medium devices (tablets, 768px and up) */
        @media (min-width: 768px) and (max-width: 991px) {

            .hero_cel {
                display: block;
            }
        }

        /* // Large devices (desktops, 992px and up) */
        @media (min-width: 992px) and (max-width: 1199px) {
            .hero {
                height: 100%;
                width: 100%;
                background-size: cover;
                background-position: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                min-height: 554px;
                background-image: url('template/assets/images/boneco-mimicas-mimics-uniplay.png');
            }

            .hero_cel {
                display: none;
            }

            .sessao-midias {
                margin-top: 100px;
            }
        }

        /* 
                            // X-Large devices (large desktops, 1200px and up) */
        @media (min-width: 1200px) and (max-width: 1500px) {
            .hero {
                height: 100%;
                width: 100%;
                background-size: cover;
                background-position: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                min-height: 630px;
                background-image: url('template/assets/images/boneco-mimicas-mimics-uniplay.png');
            }

            .hero_cel {
                display: none;
            }

            .sessao-midias {
                margin-top: 100px;
            }
        }

        /* // XX-Large devices (larger desktops, 1400px and up) */
        @media (min-width: 1501px) {
            .hero {
                height: 100%;
                min-height: 740px;
                width: 100%;
                background-size: cover;
                background-position: center;
                display: flex;
                flex-direction: column;
                align-items: center;
                position: relative;
                /*   min-height: 785px; */
                background-image: url('template/assets/images/boneco-mimicas-mimics-uniplay.png');
            }

            .hero_cel {
                display: none;
            }

            .sessao-midias {
                margin-top: 100px;
            }
        }

        .midia-icon {
            font-size: 32px;
            font-weight: 900;
            margin-top: 6px;
            margin-left: 4px;
        }

        .section-sobre p {
            font-size: 1.3rem !important;
            margin: 0 !important;
        }

    </style>
@endsection

<!-- START HERO -->
<section class="bg-blue mt-5 hero" id="inicio">
    <div class="container">
        <div class="row align-items-center pb-5">
            <div class="col-sm-12 col-md-12 col-lg-5">
                <div class="mt-md-4 mt-sm-3 mt-lg-5 mb-3">
                    <h1 class="font-tema text-success mb-4 mt-4 hero-title text-center text-uppercase"
                        style="letter-spacing: 0.2rem;">
                        Jogar Mímicas<br> nunca foi tão divertido!
                    </h1>
                    <p class="font-weight-normal lead mb-4 mt-1 text-white text-center">Chame a galera para adivinhar
                        personagens,
                        músicas, séries e
                        muito mais.</p>
                    <p class="d-flex justify-content-center p-0">
                        <a href="{{ route('anonimo') }}" target="_blank"
                            class="btn btn-lg btn-success btn-rounded font-weight-bold mr-2 text-center"
                            style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;">
                            <i class="dripicons-gaming mr-2"></i> ENTRE ANÔNIMO
                        </a>
                    </p>
                    <span class="font-weight-normal lead mt-1 text-white d-flex justify-content-center">OU
                    </span> <br>
                    <p class="d-flex justify-content-center p-0">
                        <a href="{{ route('login.socialite', ['provider' => 'facebook']) }}" target="_blank"
                            class="btn btn-lg btn-primary btn-rounded font-weight-bold mr-2 mb-3 text-center"
                            style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;">
                            <i class="mdi mdi-facebook mr-2"></i> FACEBOOK
                        </a>

                        <a href="{{ route('login.socialite', ['provider' => 'google']) }}" target="_blank"
                            class="btn btn-lg btn-danger btn-rounded font-weight-bold mb-3 text-center"
                            style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;"><i
                                class="uil-google mr-2 font-weight-bold"></i> GOOGLE </a>
                    </p>

                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-5 hero_cel">
                <img src="{{ url('template/assets/images/boneco-celular-mimicas-mimics-uniplay.png') }}"
                    alt="Boneco-mimicas-celular" title="Boneco Mímicas Celular" class="imagem-header w-100">
            </div>
        </div>
    </div>
</section>
<!-- END HERO -->

<section class="border-0 bg-blue" id="comofunciona">
    <div class="container">
        
        <!-- Header - Landing Page -->
        <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8647056672216418"
            data-ad-slot="7610584795" data-ad-format="auto" data-full-width-responsive="true"></ins>
        <script>
            (adsbygoogle = window.adsbygoogle || []).push({});

        </script>
        <div class="row mt-2">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="mt-0 text-yellow" style="font-size: 80px;">
                        <i class="mdi mdi-lightbulb-on-outline"></i>
                    </h1>
                    <h2 class="font-tema text-success text-uppercase" style="letter-spacing: 0.2rem;">Como funciona o
                        jogo?</h2>
                    <p class="lead mt-2 text-white">Veja como é simples
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-2 pt-3">
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body text-center">
                        <img src="{{ url('template/assets/images/equipes-mimicas-mimics-uniplay.png') }}"
                            class="img-fluid" alt="profile-image" style="width:270px">
                        <h4 class="text-success font-tema font-weight-bolder card-pricing-price text-uppercase"
                            style="letter-spacing: 0.2rem;">Crie as equipes</h4>
                        <p class="lead"> Divida-se em duas ou mais equipes para iniciar o jogo </p>
                        <a href="{{ route('mimica.blog.artigo', ['slug' => 'tutorial-de-como-iniciar-o-jogo']) }}"
                            class="btn btn-success mt-4 mb-2 btn-rounded">Veja mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body text-center">
                        <img src="{{ url('template/assets/images/corracontraotempo-mimicas-mimics-uniplay.png') }}"
                            class="img-fluid" alt="profile-image" style="width:270px">
                        <h4 class="text-success font-tema font-weight-bolder card-pricing-price text-uppercase"
                            style="letter-spacing: 0.2rem;">Corra contra do tempo</h4>
                        <p class="lead"> O desafio de cada equipe é acertar o maior número de palavras, antes que o
                            tempo acabe. </p>
                        <a href="{{ route('mimica.blog.artigo', ['slug' => 'tutorial-de-como-iniciar-o-jogo']) }}"
                            class="btn btn-success mt-4 mb-2 btn-rounded">Veja mais</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body text-center">
                        <img src="{{ url('template/assets/images/adivinhe-mimicas-mimics-uniplay.png') }}"
                            class="img-fluid" alt="profile-image" style="width:240px">
                        <h4 class="text-success font-tema font-weight-bolder card-pricing-price text-uppercase"
                            style="letter-spacing: 0.2rem;">Adivinhe a mimica e ganhe pontos</h4>
                        <p class="lead"> Se algum membro da sua equipe acertar a sua mimica clique em acertei para somar
                            os pontos. </p>
                        <a href="{{ route('mimica.blog.artigo', ['slug' => 'tutorial-de-como-iniciar-o-jogo']) }}"
                            class="btn btn-success mt-4 mb-2 btn-rounded">Veja mais</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 text-center mt-3">
                <a href="{{ route('mimica.home') }}/#inicio"
                    class="btn btn-lg btn-success btn-rounded font-weight-bold"
                    style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;">
                    <i class="dripicons-gaming mr-2"></i> JOGAR AGORA </a>
            </div>
        </div>
    </div>
</section>

<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#453ab7" fill-opacity="1"
        d="M0,224L48,202.7C96,181,192,139,288,138.7C384,139,480,181,576,197.3C672,213,768,203,864,192C960,181,1056,171,1152,176C1248,181,1344,203,1392,213.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
    </path>
</svg>

<!-- START RANKING -->
<section data-nosnippet class="pt-0 mb-4 border-0" id="ranking">
    <div class="container">
        <div class="row pb-1 mb-3">
            <div class="col-lg-12">
                <div class="text-center">
                    <h1 class="py-0 text-yellow" style="font-size: 80px;"><i class="mdi mdi-trophy-outline"></i>
                    </h1>
                    <h2 class="font-tema text-success text-uppercase" style="letter-spacing: 0.2rem;">Melhores Jogadores
                    </h2>
                    <p class="lead mt-2">Confira se você está entre os <strong>10 melhores</strong> do jogadores do
                        ranking.</p>

                </div>
            </div>
        </div>

        <div class="row">
            @if (empty(!$ranking))
                <?php $contador = 1; ?>
                @foreach ($ranking as $key => $item)
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="card p-0 shadow-sm" style="border-radius: 20px;">
                            <div class="card-body profile-user-box py-1 px-2">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="media">
                                            <span class="float-left m-2 mr-4">
                                                <img src="{{ $item->avatar }}" style="height: 80px;"
                                                    alt="player-mimicas-{{ $item->name }}"
                                                    title="Player {{ $item->name }}"
                                                    class="rounded-circle img-thumbnail"></span>
                                            <div class="media-body">
                                                <h4 class="my-1">{{ $contador }}. {{ $item->name }}</h4>
                                                <ul class="mb-0 list-inline">
                                                    <li class="list-inline-item mr-3">
                                                        <h5 class="mb-1 text-center">{{ $item->qtd_partida }}</h5>
                                                        <p class="mb-0 font-13">Quantidade de jogos</p>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <h5 class="mb-1 text-cener">{{ $item->pontos }}</h6>
                                                            <p class="mb-0 font-13">pontos</p>
                                                    </li>
                                                </ul>
                                            </div> <!-- end media-body-->
                                        </div>
                                    </div> <!-- end col-->
                                </div> <!-- end row -->

                            </div> <!-- end card-body/ profile-user-box-->
                        </div>
                    </div>
                    <?php $contador++; ?>
                @endforeach
            @endif

            <div class="col-lg-12 text-center mt-3">
                <a href="{{ route('mimica.home') }}/#contribua"
                    class="btn btn-lg btn-success btn-rounded font-weight-bold"
                    style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;">
                    <i class="dripicons-heart mr-2"></i> FAÇA UMA DOAÇÃO</a>
            </div>
        </div>
    </div>
</section>


{{-- <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#453ab7" fill-opacity="1" d="M0,224L48,202.7C96,181,192,139,288,138.7C384,139,480,181,576,197.3C672,213,768,203,864,192C960,181,1056,171,1152,176C1248,181,1344,203,1392,213.3L1440,224L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z"></path></svg> --}}

<!-- START Videos Instagram -->
<section data-nosnippet class="pb-5 border-0 m-0 border-0 bg-blue" id="videosinstagram">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <span class="text-yellow" style="font-size: 80px;"><i class="mdi mdi-video-vintage"></i>
                    </span>
                    <h2 class="font-tema text-success text-uppercase" style="letter-spacing: 0.2rem;">Confira os posts
                        do nosso instagram</h2>
                    <h3 class="font-weight-bold text-white mb-3"> Sabia que é possivel seus videos aparecerem na nossa
                        página?
                    </h3>
                    <p class="lead mt-2 text-white">Basta fazer um video bem divertido jogando o <span
                            class="font-tema"><a href="https://www.instagram.com/mimicsarcade/" target="_blank"
                                class="text-white">MIMICS ARCADE</a></span>, postar no stories do Instagram e marcar o
                        <strong>@@mimicsarcade</strong>. Em menos de 30 minutos seu video estará disponível para todos
                        os nossos jogadores.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            @foreach ($midias as $item)
                <div class="col-md-4">
                    <div class="card shadow" style="border-radius: 20px;">
                        @if ($item->media_type == 'VIDEO')
                            <video class="card-img-top" style="border-radius-top-left: 20px;" playsinline autoplay muted
                                loop>
                                <source src="{{ $item->media_url }}" type="video/mp4">
                            </video>
                        @else
                            <a href="{{ $item->permalink }}" target="_blank">
                                <img class="card-img-top" src="{{ $item->media_url }}" alt="Card image cap">
                            </a>
                        @endif
                        <div class="card-body text-center">
                            <a href="{{ $item->permalink }}" target="_blank">
                                <p class="font-weight-normal">{{ $item->description }} </p>
                            </a>
                            <a href="{{ $item->permalink }}" target="_blank"
                                class="btn btn-success mt-4 mb-2 btn-rounded">Veja o post</a>
                        </div>
                    </div>
                </div>
            @endforeach
            <div class="col-lg-12 text-center mt-3">
                <a href="{{ route('mimica.home') }}/#inicio"
                    class="btn btn-lg btn-success btn-rounded font-weight-bold"
                    style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;">
                    <i class="dripicons-gaming mr-2"></i>JOGAR AGORA</a>
            </div>
        </div>
    </div>
</section>
<!-- END Videos Instagram -->

<section data-nosnippet class="bg-blue" id="artigos">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 d-flex justify-content-center">
                <!-- Blog - Landing Page -->
                <ins class="adsbygoogle" style="display:block" data-ad-client="ca-pub-8647056672216418"
                    data-ad-slot="5938410471" data-ad-format="auto" data-full-width-responsive="true"></ins>
                <script>
                    (adsbygoogle = window.adsbygoogle || []).push({});

                </script>

                <div class="text-center">
                    <span class="text-yellow" style="font-size: 80px;"><i class="mdi mdi-rss"></i>
                    </span>
                    <h2 class="font-tema text-success text-uppercase" style="letter-spacing: 0.2rem;">Confira os últimos
                        artigos</h2>
                    <p class="lead mt-2 text-white"><a href="{{ route('mimica.blog') }}"
                            class="text-white text-underline">Clique aqui</a> para acessar todas as dicas, tutoriais e
                        novidades no nosso blog.
                    </p>
                </div>
            </div>
        </div>
        <div class="row mt-2 pt-3 d-flex justify-content-center">
            @if (!empty($posts))
                @foreach ($posts as $post)
                    <div class="col-md-4">
                        <div class="card shadown card-artigo" style="border-radius: 20px;">
                            <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}"
                                class="text-underline blog-link">
                                <img class="card-img-top" src="{{ $post->img_background }}" alt="Card image cap"
                                    class="card-img-top" style="border-radius: 20px 20px 0px 0px"> </a>
                            <div class="card-body ">
                                <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}">
                                    <h4 class="text-dark text-italic text-underline blog-title"
                                        style="text-decoration: black"> {{ $post->titulo }}</h4>
                                </a>
                                <h6 class="card-subtitle mb-2 mt-1 text-muted font-weight-light">
                                    {{ date('d/m/Y H:i', strtotime($post->created_at)) }}</h6>
                                <p class="card-text font-weight-light"> {{ $post->subtitulo }}
                                <p class="text-center">
                                    <a href="{{ route('mimica.blog.artigo', ['slug' => $post->slug]) }}"
                                        class="btn btn-success btn-rounded text-center">Veja mais</a>
                                </p>

                                </p>
                                <hr class="m-0">
                                <div class="row m-0 p-0">
                                    <a href="javascript: void(0);" class="btn btn-sm btn-link text-muted"><i
                                            class="uil uil-comments-alt"></i> {{ $post->quantidade_acesso }}
                                        visualizações</a>
                                    <a href="https://wa.me/?text={{ $post->titulo }}" target="_blank"
                                        class="btn btn-sm btn-link text-muted test"><i class="uil uil-share-alt"></i>
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
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
    <path fill="#453ab7" fill-opacity="1"
        d="M0,224L48,202.7C96,181,192,139,288,138.7C384,139,480,181,576,197.3C672,213,768,203,864,192C960,181,1056,171,1152,176C1248,181,1344,203,1392,213.3L1440,224L1440,0L1392,0C1344,0,1248,0,1152,0C1056,0,960,0,864,0C768,0,672,0,576,0C480,0,384,0,288,0C192,0,96,0,48,0L0,0Z">
    </path>
</svg>

<section data-nosnippet class="pb-5 pt-0 mt-0" id="contribua">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <span class="text-yellow" style="font-size: 80px;"><i class="mdi mdi-piggy-bank"></i>
                    </span>
                    <h2 class="font-tema text-success text-uppercase" style="letter-spacing: 0.2rem;">
                        Nos ajude a manter o jogo vivo
                    </h2>
                    <p class="lead mt-2"> Sabia que vocês podem contribuir com o nosso site ?
                        {{-- Existem varias funções a serem desenvolvidas e melhorias a serem implementadas, nos ajude com valor simbólico isso servirá de incentivo. --}}
                    </p>
                </div>
            </div>
        </div>

        <div class="row align-items-center mt-3">
            <div class="col-md-4 ">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body text-center">
                        <h4 class=" text-success">Colabore com</h4>
                        <h3 class="card-title pricing-card-title">R$2,00</h3>
                        <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="181088557-adac5160-1fba-4d9e-8113-2cf7a4c534c9">
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body text-center">
                        <h4 class=" text-success">Colabore com</h4>
                        <h3 class="card-title pricing-card-title">R$5,00</h3>
                        <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="181088557-941129f0-e2d9-43db-ba64-92d2f76d9445" data-source="button">
                        </script>
                    </div>
                </div>
            </div>
            <div class="col-md-4 ">
                <div class="card shadow" style="border-radius: 20px;">
                    <div class="card-body text-center">
                        <h4 class=" text-success">Colabore com</h4>
                        <h3 class="card-title pricing-card-title">R$10,00</h3>
                        <script src="https://www.mercadopago.com.br/integrations/v1/web-payment-checkout.js"
                            data-preference-id="181088557-de6fc1a8-232c-4977-b276-17cdc8eafa39" data-source="button">
                        </script>
                    </div>
                </div>
            </div>
            <div class="container">
                <span class="text-sm font-weight-normal">
                    A Uniplay tem compromisso com sua privacidade. Leia nossa <a href=""> política de privacidade.</a>
                    Os detalhes de seu pagamento serão processados pelo MercadoPago, uma empresa do Mercado Livre, (para
                    cartões de crédito/débito) ou pelo Pix.
                    Um registro de sua doação será armazenado pela Uniplay.

                    <span>
                        <br>
                        <br>
                        <span class="text-sm font-weight-normal">
                            Problemas ao doar? Envie um email para nós. <a href="mailto:contato@uniplay.com.br">
                                contato@uniplay.com.br </a>
                        </span>
                    </span>
            </div>
        </div>
    </div>
</section>

<section data-nosnippet class="cta-back pb-5 bg-blue" id="historia">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center mt-5">
                <span class="text-yellow" style="font-size: 80px;"><i class="mdi mdi-script-text-outline"></i>
                </span>
                <h2 class="font-tema text-success text-uppercase" style="letter-spacing: 0.2rem;">Um jogo clássico
                    reiventado</h2>
            </div>
            <div class="col-lg-9 col-12 mt-4 section-sobre">
                <div class="">
                    <p class="lead mt-2 text-white">
                        Mímica, é historicamente tradicional e popular no mundo inteiro, normalmente
                        conhecida como a arte de expressar os pensamentos ou sentimentos por meio de gestos.


                        A mímica ficou mais conhecida na idade média, foi mantida por atores que se deslocavam
                        percorrendo cidades e apresentando
                        espetáculos teatrais em praças e mercados.</p>
                    <br>
                    <p class="lead mt-3 text-white">
                        O jogo de mímicas foi desenvolvido para jogar com a família ou com seus amigos, não importa a
                        sua idade, a diversão é garantida!
                    </p>

                    <br>
                    <p class="lead mt-3 text-white">
                        Neste jogo você terá que usar sua criatividade para fazer as mímicas e todos seus companheiros
                        de equipe devem, então, tentar
                        adivinhar qual a palavra que está sendo interpretada, pode ser um nome de um filme, série,
                        músicas, objetos e etc... mas fique atento
                        com o tempo, você terá apenas 99 segundos. A equipe que acertar mais pontos ganha o jogo.
                    </p>
                    <br>
                    <p class="lead mt-3 text-white">
                        O Jogo <strong>Mimics</strong> possui mais de 1000 palavras cadastradas com diversos temas, é um
                        jogo totalmente grátis e não precisa baixar um aplicativo.
                    </p>

                    <p class="lead mt-3 text-white">
                        Vamos nos divertir ?
                    </p> <br>
                    <p>
                        <a href="{{ route('mimica.home') }}/#inicio"
                            class="btn btn-lg btn-success btn-rounded font-weight-bold mr-2 mt-1 text-center"
                            style="box-shadow: 0 0 0 4px #002043, 0 0 0 4px #7c92b0;">
                            <i class="dripicons-gaming mr-2"></i>JOGAR AGORA </a>
                    </p>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <img src="{{ url('template/assets/images/boneca-mimicas-mimics-uniplay.png') }}"
                    alt="boneca-mimicas-apontando-texto" title="Boneca Mímicas apontando texto"
                    class="imagem-header w-120">
            </div>
        </div>

    </div>
</section>


@section('js')

    <script>
        $(document).ready(function() {
            $(".card-post").hover(
                function() {
                    $(this).addClass('cursor-pointer').addClass('shadow');
                },
                function() {
                    $(this).removeClass('cursor-pointer').removeClass('shadow');
                }
            );
        });

    </script>
@endsection
@endsection
