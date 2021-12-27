@extends('admin.master.admin')
@section('title', 'Edição Equipe')
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
                    <h4 class="header-title">Edite uma equipe</h4>
                    <p class="text-muted font-14">
                        Atualize os dados da equipe selecionada.
                    </p>

                    <form action="{{ route('admin.equipe.update', ['equipe' => $equipe->id] ) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-group d-flex justify-content-center">
                            <img src="{{ trim($equipe->url_image) }}" class="rounded-circle avatar-lg img-thumbnail" alt="imagem equipe">
                        </div>
                        <div class="form-group">
                            <label for="equipe">Equipe</label>
                            <input type="text"  name="equipe" class="form-control"  value="{{ trim($equipe->equipe) }}">
                        </div>
                        <div class="form-group">
                            <label for="url_image">Link imagem</label>
                            <textarea type="text" rows="8"  name="url_image" class="form-control" >{{ trim($equipe->url_image) }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>

    <!-- end row -->
@endsection
