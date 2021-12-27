@extends('mimica.master.jogo')
@section('title', 'Partida')

@section('content')
    <audio id="AudioAcertei">
        <source src=" {{ url('template/assets/sounds/mixkit-extra-bonus-in-a-video-game-2045.wav') }}" type="audio/wav">
    </audio>

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
            </div>
            <div class="card-body pb-1 px-0">
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
                    PRÓXIMA CARTA<i class="dripicons-chevron-right float-right font-weight-bold"
                        style="font-size: 21px"></i>
                    </button>
            </div>
        </div> <!-- end card-body-->
    </div>

@endsection
@section('js')

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

            sectionInicio();

            $(".btn_inicio_partida").click(function() {

                startContadorEspera();
                $(this).hide();
                $(".tempo-partida").html("");
            });

            $(".btn-proximo").click(function() {
                // reseto o contador da partida para recomecar a rodada
                ResetePartida();
            });
        });

        function ResetePartida() {
            tempoPartida = 0;
            startContadorPartida();

            listarCartas();
        }


        function listarCartas() 
        {
            $.LoadingOverlay("show");

            var url = "{{ route('mimica.partida.livre.cartas', ['codigo' => $codigo]) }}";
            $(".cartas").html("");

            $("#cartas-game").removeClass("disabledElement");

            $.get(url, function(response) {

                if (response.status == 'success') {
                    $.LoadingOverlay("hide");
                    var carta = "";
                    $.each(response.data, function(index, value) {
                        carta += "<div class=\"col-lg-12 linha" + value.id + " \">";
                        carta +=
                            "<h3 class=\"text-muted font-weight-bold text-uppercase text-center\">" + value
                            .acao + "</h3>";
                        carta += "<h2 class=\"text-success text-center text-uppercase\">" + value.texto + "</h2>";
                        carta += "<p class=\"mb-0 text-muted text-center\">";
                        carta += "<span class=\"badge badge-lg text-center badge-info  mr-1\">" + value.pontuacao +
                            " pts</span>";
                        carta += "</p><hr /> </div>";
                    });

                    $(".cartas").html(carta);

                    // inicia o contador da partida
                    
                    //startContadorPartida();
                    tempoPartida = 100;
                    startContadorPartida();
            
                    $("#cartas-game").removeClass("disabledElement");

                } else {
                    $.LoadingOverlay("hide");

                    alert(
                        response.message
                    );
                }
            });
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

        function startContadorPartida() 
        {
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
                '<h2 class="mt-2 pt-1" id="active-users-count text-success">PREPARE-SE <br><br></h2>';
            html += '<h1 style="font-size: 280px" class="tempo_espera">' + tempoEspera + '</h1>';
            html +=
                '<button class="btn btn-lg btn-success btn-rounded font-weight-bold col-lg-12 col-sm-12 col-md-12 btn_inicio_partida shadow">';
            html +=
                'INICIAR PARTIDA  <i class="dripicons-media-play float-right font-weight-bold" style="font-size: 21px" ></i> </button><br><br>';

            $(".preparese").append(html);
        }


    </script>
@endsection
