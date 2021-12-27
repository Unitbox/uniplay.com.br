@extends('mimica.master.jogo')
@section('title', 'Equipes da partida')
@section('content')

@section('css')

    <style type="text/css">
        .borderless td,
        .borderless th {
            border: none;
        }

    </style>
@endsection

<div class="col-lg-6 m-0 p-0">
    <div class="card widget-flat">
        <div class="card-header pt-2 px-2 pb-0 text-center bg-success text-white">
            <section class="float-right settings row p-0">
                <a href="javascript:void(0);" class="text-white mr-2 right-bar-toggle" data-toggle="modal"
                    data-target="#top-modal">
                    <span><i class="dripicons-information text-white" style="font-size:24px"></i></span>
                </a>
            </section>
            <img src="{{ Auth::user()->avatar }}" height="64" alt="user-image" class="rounded-circle shadow">
            <h4 class="text-dark-50 text-center mt-1 font-weight-bold">{{ Auth::user()->name }} <br>
            </h4>
        </div>

        <div class="card-body px-4">
            <div class="row d-flex justify-content-center">
                <h4 class="text-center mb-3">
                    <span class="text-success text-uppercase">DIVIDA-SE EM EQUIPES </span> <br><br>
                    <span class="mt-5">ESCOLHA O NOME DA <span class="text-dark font-weight-bold posicaoequipe">PRIMEIRA EQUIPE</span> 
                </h4>
            </div>
            <div class="container">
                <div class="form-group row mb-2 d-flex justify-content-center equipes_escolhidas">
                    @php
                        $contadorEquipe = 0;
                    @endphp
                    @if (!empty($equipes_escolhidas))
                        @foreach ($equipes_escolhidas as $equipe)
                            <div class="btn-group mb-2 mx-1 col-sm-12">
                                <button type="button" class="btn btn-lg shadow-sm text-uppercase btn-success shadow"
                                    id="btn{{ $equipe->id }}" value="{{ $equipe->id }}"
                                    onclick="RemoveEquipe('{{ $equipe->id }}');">{{ strtoupper($equipe->equipe) }}</button>
                            </div>
                            @php
                             $contadorEquipe ++;
                            @endphp
                        @endForeach
                    @endif
                </div>
            </div>

            <form action="{{ route('mimica.configuracao.equipe.add') }}" method="POST" id="form-equipes">
                @csrf
                <input type="hidden" name="partida_id" id="partida_id" value="{{ $codigo }}">

                <div class="container">
                    <div class="form-group row mb-2 d-flex justify-content-center equipes">
                       
                        @if (!empty($equipes))
                            @foreach ($equipes as $equipe)
                                <div class="btn-group mb-2 mx-1 col-sm-12">
                                    <button type="button" class="btn btn-lg shadow-sm text-uppercase btn-light"
                                        style="box-shadow: 0 0 0 1px #42d29d, 0 0 0 1px #7c92b0 !important;"
                                        id="btn{{ $equipe->id }}" value="{{ $equipe->id }}"
                                        onclick="EventCadatraEquipe('{{ $equipe->id }}');">{{ strtoupper($equipe->equipe) }}</button>
                                </div>
                            @endForeach
                        @endif
                    </div>
                </div>
            </form>

            <button type="button"
                class="btn btn-lg btn-success btn-rounded font-weight-bold col-lg-12 col-sm-12 col-md-12 mt-1 mb-3 btn_inicio shadow">
                INICIAR PARTIDA <i class="dripicons-chevron-right float-right font-weight-bold"
                    style="font-size: 21px"></i>
            </button>

            <a href="{{ route('mimica.configuracao')}}"
                class="btn btn btn-link btn-rounded text-center text-success col-lg-12 col-sm-12 col-md-12 shadow"
                data-id="{{ route('mimica.home') }}">
                <i class="dripicons-chevron-left float-left font-weight-bold">
                </i>VOLTAR</a>
        </div> <!-- end card-->
    </div> <!-- end col -->
</div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $(".btn_post").LoadingOverlay("hide");

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $('.btn_inicio').click(function() {
                StartPartida();
            });
        });

        function EventCadatraEquipe(idEquipe) {

            var btnEquipe = $('.equipes button');

            $.each(btnEquipe, function(index, value) {

                $(this)
                    .removeClass('btn-success font-weight-bold')
                    .addClass('btn-light');
            });

            $("#btn" + idEquipe).toggleClass('btn-light btn-success').addClass('font-weight-bold');
            $("#btn" + idEquipe).LoadingOverlay("show");
            CadastraEquipe(idEquipe);
        }

        function CadastraEquipe(equipe) {

            var form = $("#form-equipes");
            var url = "{{ route('mimica.configuracao.equipe.add') }}";
            var partida = "{{ $codigo }}";

            $.post(url, {
                "equipe": equipe,
                "partida": partida
            }, function(response) {
                if (response.status == "success") {
                    $("#btn" + equipe).LoadingOverlay("hide");
                    ListaEquipesDisponiveis(response.data.equipes);
                    ListaEquipesEscolhidas(response.data.equipes_escolhidas);
                } else if (response.status == "warning") {
                    app.message("", response.message, "warning", 6000);
                    $("#btn" + equipe).LoadingOverlay("hide");
                } else {
                    app.message("", response.message, "error", 10000);
                    $("#btn" + equipe).LoadingOverlay("hide");
                }
            }, 'json');
        }

        function RemoveEquipe(partidaequipeid) {

            $("#btn" + partidaequipeid).LoadingOverlay("show");

            var url = "{{ route('mimica.configuracao.equipe.delete') }}";
            var partida = "{{ $codigo }}";

            $.ajax({
                url: url,
                data: {
                    'id': partidaequipeid,
                    'partida': partida
                },
                method: "POST",
                dataType: "json",
                success: function(response) {
                    if (response.status == "success") {
                        //  app.message("", response.message, "success", 2000);
                        $(".btn_excluir" + partidaequipeid).LoadingOverlay("hide");

                        ListaEquipesDisponiveis(response.data.equipes);
                        ListaEquipesEscolhidas(response.data.equipes_escolhidas);

                    } else if (response.status == "warning") {
                        app.message("", response.message, "warning", 6000);
                        $(".btn_excluir" + partidaequipeid).LoadingOverlay("hide");

                    } else {
                        app.message("", response.message, "error", 6000);
                        $(".btn_excluir" + partidaequipeid).LoadingOverlay("hide");

                    }
                }
            });
        }

        function ListaEquipesDisponiveis(data) {

            $('.equipes').html('');

            var html = "";
            $.each(data, function(index, value) {
                html += "<div class=\"btn-group mb-2 mx-1 col-sm-12\">";
                html +=
                    "<button type=\"button\" class=\"btn btn-lg shadow-sm btn-light text-uppercase \" id=\"btn" +
                    value.id + "\"  style=\"box-shadow: 0 0 0 1px #42d29d, 0 0 0 1px #7c92b0 !important;\" value=" + value.id + " onclick=\"EventCadatraEquipe(" + value.id + ");\">" + value.equipe + "</button>";
                html += "</div>"
            });

            $(".equipes").html(html);
        }

        function ListaEquipesEscolhidas(data) {

            $(".equipes_escolhidas").html("");
            var button = "";

            ListaMensagensHelp(data.length);

            $.each(data, function(index, value) {
                button += '<div class="btn-group mb-2 mx-1 col-sm-12">';
                button += '<button type="button" class="btn btn-lg shadow-sm text-uppercase btn-success"' +
                    'id="btn' + value.id + '" value="' + value.equipe + ' {{ $equipe->id }}"' +
                    'onclick="RemoveEquipe(' + value.id + ');\">' + value.equipe + '</button>';
                button += '</div>';
            });

            $(".equipes_escolhidas").html(button);
            
        }

        function StartPartida() {
            $(".btn_post").LoadingOverlay("show");

            var idpartida = $("#partida_id").val();
            var url = "{{ route('mimica.partida.start') }}";

            $.post(url, {
                "idpartida": idpartida
            }, function(response) {
                if (response.status == "success") {

                    window.location.href = response.message;

                } else if (response.status == "warning") {
                    app.message("", response.message, "warning", 6000);
                    $(".btn_post").LoadingOverlay("hide");
                } else {
                    app.message("", response.message, "warning", 10000);
                    $(".btn_post").LoadingOverlay("hide");

                }
            }, 'json');
        }

        function ListaMensagensHelp(qtdEquipe) 
        {
            var parseQtd = parseInt(qtdEquipe)

            switch (parseQtd) {
                case 0:
                    $(".posicaoequipe").text("PRIMEIRA EQUIPE");
                    break;
                case 1:
                    $(".posicaoequipe").text("SEGUNDA EQUIPE");
                     break;
                case 2:
                    $(".posicaoequipe").text("TERCEIRA EQUIPE");
                     break;
                case 3:
                    $(".posicaoequipe").text("QUARTA EQUIPE");
                break;
                case 4:
                     $(".posicaoequipe").text("QUINTA EQUIPE");
                break;
                case 5:
                      $(".posicaoequipe").text("SEXTA EQUIPE");
                break;
                default:
                    $(".posicaoequipe").text("EQUIPE");
                    break;
            }
        }

    </script>

    <script>
        $(function() {
            var contador = '{{ $contadorEquipe }}';
            ListaMensagensHelp(contador);
        });
    </script>

@endsection
