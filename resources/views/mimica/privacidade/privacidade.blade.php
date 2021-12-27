@extends('mimica.master.web')
@section('title', 'Política de privacidade')
@section('robots', 'noindex, nofollow')
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

        .ul-blog {
            font-weight: 300 !important;
            font-size: 1.3rem !important;
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
                            class="text-white text-underline"><span class="text-underline "><i
                                    class="mdi mdi-home-outline text-underline "></i>Página do jogo</a></li>
                    <li class="breadcrumb-item active">Política de privacidade</li>
                </ol>
                <span class="text-center d-block h1 blog-title font-weight-bold text-center text-success"
                    style="font-size: 45px">Política de Privacidade
                </span>
            </div>
            <div class="col-md-8 mx-auto">
                <span class="h5 d-block small text-center" style="font-weight: 300"><span class="autor">
                        Mimics Online
                    </span>
                    <span class="data mb-3">
                        {{-- {{ date('d/m/Y H:i', strtotime($artigo->created_at)) }} --}}
                    </span>
                    <br>
                    <br>
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
                    <p>A sua privacidade é importante para nós. É política do Mimics Arcade respeitar a sua privacidade
                        em relação a qualquer informação sua que possamos coletar no site <a href=uniplay.com.br>Mimics
                            Arcade</a>.</p><br />
                    <p>Solicitamos informações pessoais apenas quando realmente precisamos delas para lhe fornecer um
                        serviço. Fazemos por meios justos e legais, com o seu conhecimento e consentimento. Também
                        informamos por que estamos coletando e como será usado. </p> <br />
                    <p>Apenas retemos as informações coletadas pelo tempo necessário para fornecer o serviço solicitado.
                        Quando armazenamos dados, protegemos dentro de meios comercialmente aceitáveis ​​para evitar
                        perdas e roubos, bem como acesso, divulgação, cópia, uso ou modificação não autorizados.</p>
                    <br>
                    <p>Não compartilhamos informações de identificação pessoal publicamente ou com terceiros, exceto
                        quando exigido por lei.</p><br />
                    <p>O nosso site pode ter links para sites externos que não são operados por nós. Esteja ciente de
                        que não temos controle sobre o conteúdo e práticas desses sites e não podemos aceitar
                        responsabilidade por suas respectivas <a href='{{ route('mimica.privacidade') }}'>políticas de
                            privacidade</a>. </p><br />
                    <p>Você é livre para recusar a nossa solicitação de informações pessoais, entendendo que talvez não
                        possamos fornecer alguns dos serviços desejados.</p><br />
                    <p>O uso continuado de nosso site será considerado como aceitação de nossas práticas em torno de
                        privacidade e informações pessoais. Se você tiver alguma dúvida sobre como lidamos com dados do
                        usuário e informações pessoais, entre em contacto conosco no e-mail <a
                            href="mailto:contato@uniplay.com.br">contato@uniplay.com.br</a> .</p><br />
                    <h2 class="blog-title font-weight-bold">Política de Cookies Mimics Arcade</h2>
                    <h3 class="mt-2">O que são cookies?</h3>
                    <p>Como é prática comum em quase todos os sites profissionais, este site usa cookies, que são
                        pequenos arquivos baixados no seu computador, para melhorar sua experiência. Esta página
                        descreve quais informações eles coletam, como as usamos e por que às vezes precisamos armazenar
                        esses cookies. Também compartilharemos como você pode impedir que esses cookies sejam
                        armazenados, no entanto, isso pode fazer o downgrade ou 'quebrar' certos elementos da
                        funcionalidade do site.</p><br>
                    <h3>Como usamos os cookies?</h3>
                    <p>Utilizamos cookies por vários motivos, detalhados abaixo. Infelizmente, na maioria dos casos, não
                        existem opções padrão do setor para desativar os cookies sem desativar completamente a
                        funcionalidade e os recursos que eles adicionam a este site. É recomendável que você deixe todos
                        os cookies se não tiver certeza se precisa ou não deles, caso sejam usados ​​para fornecer um
                        serviço que você usa.</p> <br>
                    <h3>Desativar cookies</h3>
                    <p>Você pode impedir a configuração de cookies ajustando as configurações do seu navegador (consulte
                        a Ajuda do navegador para saber como fazer isso). Esteja ciente de que a desativação de cookies
                        afetará a funcionalidade deste e de muitos outros sites que você visita. A desativação de
                        cookies geralmente resultará na desativação de determinadas funcionalidades e recursos deste
                        site. Portanto, é recomendável que você não desative os cookies.</p><br>
                    <h3>Cookies que definimos</h3>
                    <ul class="ul-blog">
                        <li> Cookies relacionados à conta:<br>Se você criar uma conta conosco, usaremos cookies
                            para o gerenciamento do processo de inscrição e administração geral. Esses cookies
                            geralmente serão excluídos quando você sair do sistema, porém, em alguns casos, eles poderão
                            permanecer posteriormente para lembrar as preferências do seu site ao sair.<br><br> </li>
                        <li> Cookies relacionados ao login:<br> Utilizamos cookies quando você está logado, para que
                            possamos lembrar dessa ação. Isso evita que você precise fazer login sempre que visitar uma
                            nova página. Esses cookies são normalmente removidos ou limpos quando você efetua logout
                            para garantir que você possa acessar apenas a recursos e áreas restritas ao efetuar
                            login.<br><br> </li>
                        <li> Pedidos processando cookies relacionados:<br> Este site oferece facilidades de comércio
                            eletrônico ou pagamento e alguns cookies são essenciais para garantir que seu pedido seja
                            lembrado entre as páginas, para que possamos processá-lo adequadamente.<br><br> </li>
                        <li> Cookies relacionados a pesquisas:<br> Periodicamente, oferecemos pesquisas e
                            questionários para fornecer informações interessantes, ferramentas úteis ou para entender
                            nossa base de usuários com mais precisão. Essas pesquisas podem usar cookies para lembrar
                            quem já participou numa pesquisa ou para fornecer resultados precisos após a alteração das
                            páginas.<br><br> </li>
                        <li> Cookies relacionados a formulários:<br> Quando você envia dados por meio de um
                            formulário como os encontrados nas páginas de contacto ou nos formulários de comentários, os
                            cookies podem ser configurados para lembrar os detalhes do usuário para correspondência
                            futura.<br><br> </li>
                        <li> Cookies de preferências do site:<br> Para proporcionar uma ótima experiência neste site,
                            fornecemos a funcionalidade para definir suas preferências de como esse site é executado
                            quando você o usa. Para lembrar suas preferências, precisamos definir cookies para que essas
                            informações possam ser chamadas sempre que você interagir com uma página for afetada por
                            suas preferências.<br> </li>
                    </ul> <br>
                    <h3>Cookies de Terceiros</h3>
                    <p>Em alguns casos especiais, também usamos cookies fornecidos por terceiros confiáveis. A seção a
                        seguir detalha quais cookies de terceiros você pode encontrar através deste site.</p> <br>
                    <ul>
                        <li> Este site usa o Google Analytics, que é uma das soluções de análise mais difundidas e
                            confiáveis ​​da Web, para nos ajudar a entender como você usa o site e como podemos melhorar
                            sua experiência. Esses cookies podem rastrear itens como quanto tempo você gasta no site e
                            as páginas visitadas, para que possamos continuar produzindo conteúdo atraente. </li>
                    </ul>
                    <blockquote class="blockquote">
                        Para mais informações sobre cookies do Google Analytics, consulte a <a
                            href="https://analytics.google.com/" target="_blank" rel="noopener noreferrer">página
                            oficial</a> do Google
                        Analytics.
                    </blockquote>
                    <ul class="ul-blog">
                        <li> As análises de terceiros são usadas para rastrear e medir o uso deste site, para que
                            possamos continuar produzindo conteúdo atrativo. Esses cookies podem rastrear itens como o
                            tempo que você passa no site ou as páginas visitadas, o que nos ajuda a entender como
                            podemos melhorar o site para você.</li> <br>
                        <li> Periodicamente, testamos novos recursos e fazemos alterações na maneira como o site
                            se apresenta. Quando ainda estamos testando novos recursos, esses cookies podem ser usados
                            ​​para garantir que você receba uma experiência consistente enquanto estiver no site,
                            enquanto entendemos quais otimizações os nossos usuários mais apreciam.</li> <br>
                        <li> À medida que vendemos produtos, é importante entendermos as estatísticas sobre quantos
                            visitantes de nosso site realmente compram e, portanto, esse é o tipo de dados que esses
                            cookies rastrearão. Isso é importante para você, pois significa que podemos fazer previsões
                            de negócios com precisão que nos permitem analizar nossos custos de publicidade e produtos
                            para garantir o melhor preço possível.</li> <br>
                        <li> O serviço Google AdSense que usamos para veicular publicidade usa um cookie DoubleClick
                            para veicular anúncios mais relevantes em toda a Web e limitar o número de vezes que um
                            determinado anúncio é exibido para você.<br> Para mais informações sobre o Google AdSense,
                            consulte as FAQs oficiais sobre privacidade do Google AdSense. </li> <br>
                        <li> Utilizamos anúncios para compensar os custos de funcionamento deste site e fornecer
                            financiamento para futuros desenvolvimentos. Os cookies de publicidade comportamental usados
                            &nbsp;
                            ​​por este site foram projetados para garantir que você forneça os anúncios mais relevantes
                            sempre que possível, rastreando anonimamente seus interesses e apresentando coisas
                            semelhantes que possam ser do seu interesse.</li><br>
                        <li>Vários parceiros anunciam em nosso nome e os cookies de rastreamento de afiliados
                            simplesmente nos permitem ver se nossos clientes acessaram o site através de um dos sites de
                            nossos parceiros, para que possamos creditá-los adequadamente e, quando aplicável, permitir
                            que nossos parceiros afiliados ofereçam qualquer promoção que pode fornecê-lo para fazer uma
                            compra. </li>
                    </ul> <br>
                    <h3>Compromisso do Usuário</h3>
                    <p>O usuário se compromete a fazer uso adequado dos conteúdos e da informação que o Mimics Arcade
                        oferece no site e com caráter enunciativo, mas não limitativo:</p>
                    <ul class="list-group list-group-flush ul-blog">
                        <li class="list-group-item">A) Não se envolver em atividades que sejam ilegais ou contrárias à
                            boa fé a à ordem pública;
                        </li>
                        <li class="list-group-item">B) Não difundir propaganda ou conteúdo de natureza racista,
                            xenofóbica, ou, casas de apostas online (ex.: Betano), jogos de
                            sorte e azar, qualquer tipo de pornografia ilegal, de apologia ao terrorismo ou contra os
                            direitos humanos;</li>
                        <li class="list-group-item">C) Não causar danos aos sistemas físicos (hardwares) e lógicos
                            (softwares) do Mimics Arcade,
                            de seus fornecedores ou terceiros, para introduzir ou disseminar vírus informáticos ou
                            quaisquer outros sistemas de hardware ou software que sejam capazes de causar danos
                            anteriormente mencionados.</li>
                    </ul> <br>
                    <h3>Mais informações</h3>
                    <p>Esperemos que esteja esclarecido e, como mencionado anteriormente, se houver algo que você não
                        tem certeza se precisa ou não, geralmente é mais seguro deixar os cookies ativados, caso
                        interaja com um dos recursos que você usa em nosso site.</p>
                    <br>
                    <p>
                        Se tiver dúvidas sobre esta política, você pode nos contatar no e-mail <a
                            href="mailto:contato@uniplay.com.br">contato@uniplay.com.br</a>.
                    </p>

                    <p>
                        Esta política é efetiva a partir de Abril/2021.    
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- <section class="py-4 bg-light text-dark px-3" style="min-height: 300px; position: relative;">
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
                            <div class="card" style="border-radius: 20px;">
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
    </section> --}}

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
