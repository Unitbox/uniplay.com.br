@extends('admin.master.admin')
@section('title', 'Cadastro Carta')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.carta.index') }}">Cartas</a></li>
                        <li class="breadcrumb-item active">Carta</li>
                    </ol>
                </div>
                <h4 class="page-title">Carta</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cadastre uma carta</h4>
                    <p class="text-muted font-14">
                        Insira os dados da nova Carta.
                    </p>
                    <form action="{{ route('admin.carta.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="carta">Carta</label>
                                <input type="text" name="carta" class="form-control" placeholder="ex. Primeira Carta"
                                    value="Padrão">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="observacao">Observação</label>
                                <input type="text" class="form-control" id="observacao" name="observacao" value="padrão" />
                            </div>
                        </div>


                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="categoria_id" class="col-form-label">Categoria</label>
                                <select id="categoria_id" name="categoria_id" class="form-control">
                                    <option>Selecione um item</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}" selected>{{ $item->categoria }} </option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="idioma_id" class="col-form-label">Idioma</label>
                                <select id="idioma_id" name="idioma_id" class="form-control">
                                    <option>Selecione um item</option>
                                    @foreach ($idiomas as $item)
                                        @if ($item->idioma == 'Português')
                                            <option value="{{ $item->id }}" selected>{{ $item->idioma }} </option>


                                        @else
                                            <option value="{{ $item->id }}">{{ $item->idioma }} </option>

                                        @endif

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nivel_dificuldade_id" class="col-form-label">Dificuldade</label>
                                <select id="nivel_dificuldade_id" name="nivel_dificuldade_id" class="form-control">
                                    <option>Selecione um item</option>
                                    <option value="1">Fácil</option>
                                    <option value="2">Médio</option>
                                    <option value="3">Difícil</option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>

    <!-- end row -->
@endsection
