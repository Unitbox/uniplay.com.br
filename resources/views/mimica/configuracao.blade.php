@extends('mimica.master.jogo')
@section('title', 'Configuração da partida')
@section('css')
    <style type="text/css">
        .bootstrap-touchspin-down,
        .bootstrap-touchspin-up {
            color: #fff;
            background-color: #42d29d;
            border-color: #42d29d;
        }

    </style>
@endsection

@section('content')
    <div class="col-lg-6 m-0 p-0">
        <div class="card widget-flat">
            <div class="card-header pt-2 px-2 pb-1 text-center bg-success text-white bg-blue">
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
            <div class="card-body">
                <form action="{{ route('mimica.configuracao.add') }}" method="POST">
                    <div class="row">
                        @csrf
                        <div class="col-12">
                            <h4 class="page-title text-uppercase mb-3 text-center font-weight-bold" style="font-size: 23px;"> Idioma do jogo</h4>
                            <div class="form-group row mb-3 d-flex justify-content-center idioma">
                                <div class="btn-group mb-1">
                                    <button type="button" class="btn btn-lg btn-light default-idioma shadow"
                                        value="1">PORTUGUÊS</button>
                                    {{-- <button type="button" class="btn btn-lg btn-light" value="2">INGLÊS</button> --}}
                                    <input type="hidden" name="idioma_id" value="1">
                                </div>
                            </div>
                            <hr>
                            <h4 class="page-title text-uppercase mb-3 mt-2 text-center" style="font-size: 23px;"> Dificuldade das cartas</h4>
                            <div class="form-group row mb-3 d-flex justify-content-center nivel">
                                <div class="btn-group mb-2">
                                    {{-- <button type="button" class="btn btn-lg btn-light" value="1">FÁCIL</button> --}}
                                    <button type="button" class="btn btn-lg btn-light default-nivel"
                                        value="2">NORMAL</button>
                                    <button type="button" class="btn btn-lg btn-light" value="3">DIFÍCIL</button>
                                    <input type="hidden" name="dificuldade_id" value="2">
                                </div>
                            </div>
                            {{-- <input type="text" value="2" class="form-control-lg " min="1" max="10"
                                name="qtd_jogadores_equipe" id="qtd_jogadores_equipe"> --}}
                            <hr>
                            <h4 class="page-title text-uppercase mb-3 mt-2 text-center" style="font-size: 23px;">MODO DE JOGO</h4>
                            <div class="form-group row mb-3 d-flex justify-content-center modo">
                                <div class="btn-group mb-2">
                                    <button type="button" class="btn btn-lg btn-success shadow font-weight-bold "
                                    value="2">LIVRE</button>
                                    <button type="button" class="btn btn-lg btn-light"
                                    value="1">EM EQUIPES</button>
                                   
                                </div>
                                <input type="hidden" value="2" name="categoria_id" id="categoria_id">
                            </div>
                            <hr>
                            <button
                                class="btn btn-lg btn-success btn-rounded font-weight-bold col-lg-12 col-sm-12 col-md-12 mt-2 shadow"
                                type="submit">
                                CONTINUAR <i class="dripicons-chevron-right float-right font-weight-bold"
                                    style="font-size: 21px"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div> <!-- end card-body-->
        </div> <!-- end card-->
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            selectedDefault();

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

            $('.idioma button').click(function() {

                var btnIdioma = $('.idioma button');

                $.each(btnIdioma, function(index, value) {
                    $(this)
                        .removeClass('btn-success font-weight-bold')
                        .addClass('btn-light');
                });

                $(this).toggleClass('btn-light btn-success').addClass('font-weight-bold');
                $('input[name="idioma_id"]').val($(this).attr('value'));
            });

            $('.nivel button').click(function() {

                var btnNivel = $('.nivel button');

                $.each(btnNivel, function(index, value) {
                    $(this)
                        .removeClass('btn-success font-weight-bold shadow')
                        .addClass('btn-light');
                });

                $(this).toggleClass('btn-light btn-success').addClass('font-weight-bold shadow');
                $('input[name="dificuldade_id"]').val($(this).attr('value'));
            });

            $('.modo button').click(function() {

                var btnModo = $('.modo button');

                $.each(btnModo, function(index, value) {
                    $(this)
                        .removeClass('btn-success font-weight-bold shadow')
                        .addClass('btn-light');
                });

                $(this).toggleClass('btn-light btn-success').addClass('font-weight-bold shadow');
                    $('input[name="categoria_id"]').val($(this).attr('value'));
                });

        });

        function selectedDefault() {

            $('.default-nivel').toggleClass('btn-light btn-success shadow').addClass('font-weight-bold');
            $('.default-idioma').toggleClass('btn-light btn-success').addClass('font-weight-bold');
            $('.default-modo').toggleClass('btn-light btn-success').addClass('font-weight-bold');
        }

    </script>

@endsection
