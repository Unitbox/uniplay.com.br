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

        .form-control-lg {
            font-weight: 100 !important;
            border: 0;
            border-radius: 0;
            border-bottom: solid 1.5px #555;
            padding: 0;
        }

    </style>
@endsection

@section('content')
    <div class="col-lg-6 m-0 p-0">
        <div class="card widget-flat">
            <div class="card-header pt-2 px-2 pb-1 text-center bg-success text-white">
                <section class="float-right settings row p-0">
                    <a href="javascript:void(0);" class="text-white mr-2 right-bar-toggle" data-toggle="modal"
                        data-target="#top-modal">
                        <span><i class="dripicons-information text-white" style="font-size:24px"></i></span>
                    </a>
                </section>
                <img src="{{ url('template/assets/images/avatar-player1-mimics-uniplay.png') }}" height="100"
                    alt="user-image" class="rounded-circle p-0">
                <h4 class="text-dark-50 text-center mt-1 font-weight-bold text-name"> Anônimo154
                </h4>
            </div>
            <form class="pl-3 pr-3" action="{{ route('anonimo.post') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if ($errors->any())
                        <div claass="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <div class="form-group">
                        <h4 class="page-title text-uppercase mb-3 font-weight-bold">Digite nome *</h4>
                        <input class="form-control form-control-lg" type="text" id="name" name="name" required=""
                            placeholder="Seu primeiro nome" required>
                    </div>

                    <div class="form-group">
                        <h4 class="page-title text-uppercase mb-3 font-weight-bold mt-3">Digite seu e-mail *</h4>
                        <input class="form-control form-control-lg" type="email" id="email" name="email" required=""
                            placeholder="Seu e-mail" required>
                    </div>

                    <div class="form-group">
                        <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" id="termos" name="termos" required>
                            <label class="custom-control-label" for="termos">
                                De acordo com as Leis 12.965/2014 e 13.709/2018, que regulam o uso da Internet e o
                                tratamento de dados pessoais no Brasil,
                                ao enviar seus dados autorizo o Mimics Arcade salvar suas informações e concordo com suas <a
                                    href="{{ route('mimica.privacidade') }}">Políticas de
                                    Privacidade</a>.
                            </label>
                        </div>
                    </div>

                </div>
                <!-- end card-body-->
                <div class="card-footer game">
                    <button type="submit"
                        class="btn btn-lg btn-success btn-rounded font-weight-bold btn-proximo col-lg-12 col-sm-12 col-md-12 mb-3 btn_post shadow">
                        CONTINUAR<i class="dripicons-chevron-right float-right font-weight-bold"
                            style="font-size: 21px"></i>
                    </button>
                </div>
            </form>
        </div> <!-- end card-->
    </div>
@endsection
@section('js')
    <script>
        $(document).ready(function() {

            $('#name').keyup(function() {
                var value = $(this).val();

                $(".text-name").text(value);
            });

        });

    </script>

@endsection
