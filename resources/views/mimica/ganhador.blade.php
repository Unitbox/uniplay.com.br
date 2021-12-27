@extends('mimica.master.jogo')
@section('title', 'Você ganhou')
@section('content')

    {{-- <audio id="myAudio">
        <source src=" {{ url('template/assets/sounds/aplausos.mp3') }}" type="audio/mpeg">
    </audio> --}}

    <canvas id="my-canvas"></canvas>

    <div class="col-lg-6 title m-0 p-0">
        <div class="card text-center">
            <div class="card-header pt-2 px-2 pb-1 text-center bg-success text-white">
                <section class="float-right settings row">
                    <a href="javascript:void(0);" class="text-white mx-2 right-bar-toggle" data-toggle="modal"
                        data-target="#top-modal">
                        <span><i class="dripicons-information text-white" style="font-size:20px"></i></span>
                    </a>
                </section>

                <div class="text-center w-75 m-auto">
                    @if ($empate)
                        <h4 class="text-dark-50 text-center mt-1 font-weight-bold">EMPATE&nbsp;<span
                                class="equipe_vez"></span>
                        </h4>
                    @else
                        <h4 class="text-dark-50 text-center mt-1 font-weight-bold">VENCEDOR&nbsp;<span
                                class="equipe_vez"></span>
                        </h4>
                    @endif
                </div>
            </div>
            <div class="card-body ">
                <div class=" d-flex justify-content-center mb-4">
                    @foreach ($equipeCampea as $item)
                        <div class="col">
                            <img src="{{ $item->url_image }}" class="rounded-circle avatar-lg img-thumbnail"
                                alt="profile-image">

                            @if ($empate)
                                <h4 class="mb-0 mt-2"> EQUIPE <span
                                        class="text-success text-uppercase">{{ $item->equipe }}</span> FEZ
                                    {{ $pontos }} PONTOS</h4>
                            @else
                                <h4 class="mb-0 mt-2"> Equipe <span
                                        class="text-success text-uppercase">{{ $item->equipe }}</span> VENCEU COM
                                    {{ $pontos }} PONTOS</h4>
                            @endif
                        </div>

                    @endforeach
                </div>


                <div class="card-footer game">
                    <button type="button" onclick="ProximaPartida()"
                        class="btn  btn-success btn-rounded font-weight-bold btn-proximo col-lg-12 col-sm-12 col-md-12 text-uppercase"><i
                            class="mdi mdi-check-bold float-left">
                        </i>PRÓXIMA PARTIDA</button>

                    <button type="button" onclick="PaginaHome()"
                        class="btn  btn-info btn-rounded font-weight-bold btn-proximo col-lg-12 col-sm-12 col-md-12 mt-2 text-uppercase"><i
                            class="dripicons-chevron-left float-left font-weight-bold">
                        </i> VOLTAR PARA PÁGINA INICIAL</button>
                </div>
                <h4 class="header-title mb-3 text-center mt-2">Compartilhe essa vitória com seus amigos</h4>
                <ul class="social-list list-inline mt-3 mb-0">
                    <li class="list-inline-item">
                        <a id="facebook-share-btt" target="_blank" href="javascript: void(0);"
                            class="social-list-item border-primary text-primary"><i class="mdi mdi-facebook"
                                data-social="fb"></i></a>
                    </li>

                    <li class="list-inline-item">
                        <a id="whatsapp-share-btt" target="_blank" href="javascript: void(0);"
                            class="social-list-item border-success text-success"><i class="mdi mdi-whatsapp"></i></a>
                    </li>
                </ul>
            </div> <!-- end card-body -->
        </div>
    </div>

@endsection
@section('css')
    <style type="text/css">
        canvas {
            position: absolute;
            bottom: 0;
            left: 0;
            width: 100%;
        }

        .title {
            position: absolute;
            margin-top: 70px;
            width: 100vw;
            text-align: center;
        }

        .coracao {

            position: relative;
            margin: 0 20px;
            animation: pulse 1s infinite alternate ease-in-out;
            margin: 0 auto;
        }

        @keyframes pulse {
            0% {
                transform: scale(.9) rotate(0);
            }

            50% {
                transform: scale(1.1) rotate(15deg);
            }

            100% {
                transform: scale(1.1) rotate(-15deg);
            }
        }

    </style>
@endsection
@section('js')

    <script src="{{ asset('template/assets/js/confetti-js.js') }}"></script>
    <script src="{{ asset('template/assets/js/index.js') }}"></script>

    <script>
        //Constrói a URL depois que o DOM estiver pronto
        document.addEventListener("DOMContentLoaded", function() {
            //conteúdo que será compartilhado: Título da página + URL
            var conteudo = encodeURIComponent(
                "Acabei de ganhar uma partida no MIMICS, consegue me vencer em um desafio? \n" +
                "https://uniplay.com.br/");

            document.getElementById("facebook-share-btt").href = "https://www.facebook.com/sharer/sharer.php?u=" +
                encodeURIComponent('https://uniplay.com.br/');
            //altera a URL do botão
            document.getElementById("whatsapp-share-btt").href = "https://api.whatsapp.com/send?text=" + conteudo;
        }, false);

        $(document).ready(function() {
            $('#shareBlock').cShare({
                description: 'Campeão de mímica no mimics arcade',
                showButtons: ['fb', 'line', 'plurk', 'weibo', 'twitter', 'tumblr', 'email']
            });
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            // $("canvas,div").click(function() {
            //     playAudio();
            // });
        });

        function ProximaPartida() {
            var url = "{{ route('mimica.configuracao') }}";
            location.href = url;
        }

        function PaginaHome() {
            var url = "{{ route('mimica.home') }}";
            location.href = url;
        }

        // function playAudio() {
        //     var x = document.getElementById("myAudio");
        //     x.play();
        // }

        var confettiSettings = {
            target: 'my-canvas',
            max: 200,
            props: ['square']
        };
        var confetti = new ConfettiGenerator(confettiSettings);
        confetti.render();

    </script>

@endsection
