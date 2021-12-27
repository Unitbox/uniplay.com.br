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
                    <li class="breadcrumb-item active">Termos de uso</li>
                </ol>
                <span class="text-center d-block h1 blog-title font-weight-bold text-center text-success"
                    style="font-size: 45px">Termos de Uso
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

            </div>
        </div>
    </div>
</section>

<div class="container-fluid px-0 mx-0">
    <section class="py-4 bg-white text-dark px-3 section-artigo" style="min-height: 300px; position: relative;">
        <div class="container">
            <div class="row">
                <div class="col-md-8 mx-auto blog-content py-3">

                    <h2 class="blog-title mb-3">1. Termos</h2>
                    <p>Ao acessar ao site <a href='https://uniplay.com.br'>Mimics Arcade</a>, você concorda em cumprir estes
                        termos de serviço, todas as leis e regulamentos aplicáveis ​​e concorda que é responsável pelo
                        cumprimento de todas as leis locais aplicáveis. Se você não concordar com algum desses termos,
                        está proibido de usar ou acessar este site. Os materiais contidos neste site são protegidos
                        pelas leis de direitos autorais e marcas comerciais aplicáveis.</p> <br>
                    <h2 class="blog-title mb-3">2. Uso de Licença</h2>
                    <p>É concedida permissão para baixar temporariamente uma cópia dos materiais (informações ou
                        software) no site Mimics Arcade , apenas para visualização transitória pessoal e não comercial.
                        Esta é a concessão de uma licença, não uma transferência de título e, sob esta licença, você não
                        pode: </p>
                    <ul class="list-group list-group-flush ul-blog">
                        <li class="list-group-item">1. modificar ou copiar os materiais;  </li>
                        <li class="list-group-item">2. usar os materiais para qualquer finalidade comercial ou para exibição pública (comercial ou
                            não comercial);  </li>
                        <li class="list-group-item">3. tentar descompilar ou fazer engenharia reversa de qualquer software contido no site Mimics
                            Arcade;  </li>
                        <li class="list-group-item">4. remover quaisquer direitos autorais ou outras notações de propriedade dos materiais;
                        </li>
                        <li class="list-group-item">5. transferir os materiais para outra pessoa ou 'espelhar' os materiais em qualquer outro
                            servidor.</li>
                    </ul> <br>
                    <p>Esta licença será automaticamente rescindida se você violar alguma dessas restrições e poderá ser
                        rescindida por Mimics Arcade a qualquer momento. Ao encerrar a visualização desses materiais ou
                        após o término desta licença, você deve apagar todos os materiais baixados em sua posse, seja em
                        formato eletrónico ou impresso.</p> <br>
                        <h2 class="blog-title mb-3">3. Isenção de responsabilidade</h2>
                    <ul class="list-group list-group-flush ul-blog">
                        <li class="list-group-item">1. Os materiais no site da Mimics Arcade são fornecidos 'como estão'. Mimics Arcade não oferece
                            garantias, expressas ou implícitas, e, por este meio, isenta e nega todas as outras
                            garantias, incluindo, sem limitação, garantias implícitas ou condições de comercialização,
                            adequação a um fim específico ou não violação de propriedade intelectual ou outra violação
                            de direitos. </li>
                            <li class="list-group-item">2. Além disso, o Mimics Arcade não garante ou faz qualquer representação relativa à precisão,
                            aos resultados prováveis ​​ou à confiabilidade do uso dos materiais em seu site ou de outra
                            forma relacionado a esses materiais ou em sites vinculados a este site.</li>
                    </ul> <br>
                    <h2 class="blog-title mb-3">4. Limitações</h2>
                    <p>Em nenhum caso o Mimics Arcade ou seus fornecedores serão responsáveis ​​por quaisquer danos
                        (incluindo, sem limitação, danos por perda de dados ou lucro ou devido a interrupção dos
                        negócios) decorrentes do uso ou da incapacidade de usar os materiais em Mimics Arcade, mesmo que
                        Mimics Arcade ou um representante autorizado da Mimics Arcade tenha sido notificado oralmente ou
                        por escrito da possibilidade de tais danos. Como algumas jurisdições não permitem limitações em
                        garantias implícitas, ou limitações de responsabilidade por danos conseqüentes ou incidentais,
                        essas limitações podem não se aplicar a você.</p> <br>
                    <h2>5. Precisão dos materiais</h2>
                    <p>Os materiais exibidos no site da Mimics Arcade podem incluir erros técnicos, tipográficos ou
                        fotográficos. Mimics Arcade não garante que qualquer material em seu site seja preciso, completo
                        ou atual. Mimics Arcade pode fazer alterações nos materiais contidos em seu site a qualquer
                        momento, sem aviso prévio. No entanto, Mimics Arcade não se compromete a atualizar os materiais.
                    </p> <br>
                    <h2 class="blog-title mb-3">6. Links</h2>
                    <p>O Mimics Arcade não analisou todos os sites vinculados ao seu site e não é responsável pelo
                        conteúdo de nenhum site vinculado. A inclusão de qualquer link não implica endosso por Mimics
                        Arcade do site. O uso de qualquer site vinculado é por conta e risco do usuário.</p>
                    </p> <br>
                    <h3>Modificações</h3>
                    <p>O Mimics Arcade pode revisar estes termos de serviço do site a qualquer momento, sem aviso
                        prévio. Ao usar este site, você concorda em ficar vinculado à versão atual desses termos de
                        serviço.</p>
                    <h3>Lei aplicável</h3>
                    <p>Estes termos e condições são regidos e interpretados de acordo com as leis do Mimics Arcade e
                        você se submete irrevogavelmente à jurisdição exclusiva dos tribunais naquele estado ou
                        localidade.</p> <br>
                        <p>
                            Se tiver dúvidas sobre este termo, você pode nos contatar no e-mail <a
                                href="mailto:contato@uniplay.com.br">contato@uniplay.com.br</a>.
                        </p>
                </div>
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
