@extends('admin.master.admin')
@section('title', 'Cadastro Equipe')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.equipe.index') }}">Equipes</a></li>
                        <li class="breadcrumb-item active">Equipe</li>
                    </ol>
                </div>
                <h4 class="page-title">Equipe</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cadastre uma equipe</h4>
                    <p class="text-muted font-14">
                        Insira os dados da nova equipe.
                    </p>

                    <form action="{{ route('admin.equipe.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="equipe">Equipe</label>
                            <input type="text"  name="equipe" class="form-control" placeholder="ex. Filme">
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
