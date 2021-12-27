@extends('admin.master.admin')
@section('title', 'Cadastro Categoria')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.categoria.index') }}">Categorias</a></li>
                        <li class="breadcrumb-item active">Categoria</li>
                    </ol>
                </div>
                <h4 class="page-title">Categoria</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cadastre uma categoria</h4>
                    <p class="text-muted font-14">
                        Insira os dados da nova categoria.
                    </p>

                    <form action="{{ route('admin.categoria.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="categoria">Categoria</label>
                            <input type="text"  name="categoria" class="form-control" placeholder="ex. Filme">
                        </div>
                        <div class="form-group">
                            <label for="observacao">Observação</label>
                            <input type="text"  name="observacao" class="form-control" placeholder="ex. Filmes infântis">
                        </div>
                        <div class="form-group">
                            <label for="url_image">Link imagem</label>
                            <input type="text"  name="url_image" class="form-control" placeholder="ex. https//imagemequipe.com">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>

    <!-- end row -->
@endsection
