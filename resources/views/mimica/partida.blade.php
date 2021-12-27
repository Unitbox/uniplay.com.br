@extends('mimica.master.jogo')
@section('title', 'Partida')

@section('content')
    <audio id="AudioAcertei">
        <source src=" {{ url('template/assets/sounds/mixkit-extra-bonus-in-a-video-game-2045.wav') }}" type="audio/wav">
    </audio>

    <input type="hidden" value="" id="idjogada">
    <div class="col-lg-6 m-0 p-0">
        <div class="card widget-flat shadow">
            <!-- Logo -->
            <div class="card-header pt-2 px-2 pb-1 text-center bg-success text-white">
                <section class="float-right settings row">
                    <a href="javascript:void(0);" class="text-white mx-2 right-bar-toggle p-0" data-toggle="modal"
                        data-target="#top-modal">
                        <span><i class="dripicons-information text-white" style="font-size:23px"></i></span>
                    </a>
                </section>
                <span class="float-left round p-0"> <span class="text-sm">Rod.</span>
                    <span class="font-weight h3 rodada_vez"></span>/{{ $_COOKIE['config_partida'] }}</span>

                <div class="text-center w-75 m-auto">
                    {{-- <img src="" height="64" alt="equipe-image" class="rounded-circle shadow equipe_img"> --}}
                    <h5 class="text-dark-50 text-center mt-1 font-weight-bold">EQUIPE&nbsp;<span
                            class="equipe_vez"></span>&nbsp;<span class="equipe_pontos"></span>
                    </h5>
                </div>
            </div>
            <div class="card-body pb-1">
                <section class="game" id="cartas-game" style="display: none;">
                    <section class="cartas"></section>
                    <div class="tempo-partida container">

                    </div>
                </section>
                <section class="preparese text-center h-100">
                </section>
            </div>

            <div class="card-footer game shadow" style="display: none;">
                <button type="button"
                    class="btn btn-lg btn-success btn-rounded font-weight-bold btn-proximo col-lg-12 col-sm-12 col-md-12 btn_post shadow" >
                    PRÓXIMA EQUIPE<i class="dripicons-chevron-right float-right font-weight-bold"
                        style="font-size: 21px"></i>
                    </button>
            </div>
        </div> <!-- end card-body-->
    </div>

@endsection
@section('js')

    {{-- <script>
        $(window).bind("beforeunload", function() {
            console.log("length", $("#idjogada").val().length);
            if ($("#idjogada").val().length > 0)
                return "Tem certeza que deseja sair da partida?";
        })
    </script> --}}
    <script>
        var tempoEspera = new Number();
        var tempoPartida = new Number();

        tempoEspera = 5;
        tempoPartida = 100;

        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });
            app.MenuAjuda();

            sectionInicio();

            listarDadosPartida();

            $(".btn_inicio_partida").click(function() {
                startContadorEspera();
                $(this).hide();
                $(".tempo-partida").html("");
            });

            $(".btn-proximo").click(function() {
                proximaEquipe();

                // reseto o contador da partida para recomecar a rodada
                tempoPartida = 0;
            });

        });


        function listarDadosPartida() {

            $(".btn_inicio_partida").addClass("disabledElement");

            var url = "{{ route('mimica.partida.list', ['codigo' => $codigo]) }}";

            $.get(url, function(response) {
                if (response.status == "success") {

                    $(".equipe_vez").text(response.data.equipe.toUpperCase());
                    $(".equipe_pontos").text(response.data.pontos + " pts");
                    $(".equipe_img").attr("src", response.data.url_image);
                    $("#idjogada").val(response.data.id);

                    $(".rodada_vez").text(response.data.rodada_partida_vez);
                    $(".btn_inicio_partida").removeClass("disabledElement");


                } else {
                    location.href = response.data;
                }
            });

        }

        function proximaEquipe() {
            $(".btn_post").LoadingOverlay("show");

            var idjogada = $("#idjogada").val();

            var url = '{{ route('mimica.partida.proximo', ':idpartidaequipe') }}';
            url = url.replace(':idpartidaequipe', idjogada);

            $.get(url, function(response) {
                if (response.status == "success") {

                    if (response.concluido == false) {
                        $(".btn_post").LoadingOverlay("hide");

                        listarDadosPartida();

                        showPreparese();

                    } else {
                        window.location.href = response.concluido;
                    }
                }
            });
        }

        function listarCartas() {

            var url = "{{ route('mimica.partida.cartas', ['codigo' => $codigo]) }}";
            $(".cartas").html("");


            $("#cartas-game").removeClass("disabledElement");

            $.get(url, function(response) {

                if (response.status == 'success') {

                    var carta = "";
                    $.each(response.data, function(index, value) {
                        carta += "<div class=\"col-lg-12 linha" + value.id + " \">";
                        carta += "<div class=\"float-right\">";
                        carta +=
                            "<a href=\"javascript: void(0);\" class=\"btn btn-sm btn-rounded btn-outline-success ml-1 row btn-pontos" +
                            value.id + "\" onclick=\"marcarPontos(" +
                            value.pontuacao + ", " + value.id + ");\">👍 Acertei</a></div>";
                        carta +=
                            "<h3 class=\"text-muted font-weight-bold p-0 text-uppercase\">" + value
                            .acao + "</h3>";
                        carta += "<h2 class=\"text-success font-weight-bold text-uppercase font-game\">" + value.texto + "</h2>";
                        carta += "<p class=\"mb-0 text-muted\">";
                        carta += "<span class=\"badge badge-lg  badge-info  mr-1\">" + value.pontuacao +
                            " pts</span>";
                        carta += "</p><hr /> </div>";
                    });

                    $(".cartas").html(carta);

                    // inicia o contador da partida
                    startContadorPartida();

                } else {

                    alert(
                        response.message
                    );
                }
            });
        }

        function marcarPontos(pontos, idcarta) {

            var idjogada = $("#idjogada").val();
            $(".linha" + idcarta).addClass('disabledElement');

            var url = "{{ route('mimica.partida.marcarpontos') }}";

            playAudioAcertei();

            $.post(url, {
                "idJogada": idjogada,
                "pontos": pontos,

            }, function(response) {
                if (response.status == "success") {
                    $(".equipe_pontos").text(response.data.pontos + " pts");
                }

            }, 'json');
        }

        function hideAguarde() {
            $(".game").hide();
        }

        function showGame() {
            $(".game").show();
            $(".preparese").hide();
        }

        function showPreparese() {
            tempoEspera = 5;
            tempoPartida = 100;

            $(".tempo_espera").text(tempoEspera);
            $(".game").hide();
            $(".preparese").show();
            $(".btn_inicio_partida").show();
        }

        function startContadorEspera() {

            if ((tempoEspera - 1) >= 0) {

                $(".tempo_espera").text(tempoEspera);

                setTimeout('startContadorEspera();', 1000);

                if (tempoEspera == 1) {
                    // acelera o inicio das cartas
                    listarCartas();
                }
                tempoEspera--;
            } else {

                $(".tempo_espera").css('font-size', '200px').text("GO");

                setTimeout('showGame()', 1000);
            }

        }

        function startContadorPartida() {

            if ((tempoPartida - 1) >= 0) {

                if (tempoPartida == 100) {

                    var progress = '';
                    progress += '<div class="progress">';
                    progress +=
                        '<div class="progress-bar progress-bar-striped progress-bar-animated bg-success progress-partida"';
                    progress +=
                        'role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>';
                    progress += '</div>';
                    progress += '<div class="d-flex justify-content-between">';
                    progress += '<div>Fim partida</div>';
                    progress += '<div class="tempo_partida_segundos">' + tempoPartida + '</div>';
                    progress += '</div>'

                    $(".tempo-partida").html(progress);
                }

                $('.progress-partida').css('width', tempoPartida + "%")
                    .attr("aria-valuenow", tempoPartida);

                $(".tempo_partida_segundos").text(tempoPartida + "s");

                setTimeout('startContadorPartida();', 1000);

                tempoPartida--;
            } else {
                $(".tempo-partida").html(
                    "<p class=\"font-weight-bold text-center h4 p-0 m-0\"><span class=\"text-center h3\">" +
                    "FIM DA PARTIDA!" + "</span></p>");

                $("#cartas-game").addClass("disabledElement");
            }
        }

        function sectionInicio() {

            var html = '';
            html += '';
            html +=
                '<h2 class="mt-2 pt-1" id="active-users-count text-success font-game ">PREPARE-SE <br><br>EQUIPE <span class="text-success font-weight-bold equipe_vez"> </span></h2>';
            html += '<h1 style="font-size: 280px" class="tempo_espera">' + tempoEspera + '</h1>';
            html +=
                '<button class="btn btn-lg btn-success btn-rounded font-weight-bold col-lg-12 col-sm-12 col-md-12 btn_inicio_partida shadow">';
            html +=
                'INICIAR PARTIDA  <i class="dripicons-media-play float-right font-weight-bold" style="font-size: 21px" ></i> </button><br><br>';

            $(".preparese").append(html);
        }

        function playAudioAcertei() {
            var sound = sessionStorage.getObj("sound");

            if (sound) {
                var x = document.getElementById("AudioAcertei");
                x.play();
            }
        }

    </script>
@endsection
