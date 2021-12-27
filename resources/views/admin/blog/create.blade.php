@extends('admin.master.admin')
@section('title', 'Cadastro de Artigo')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.blog.index') }}">Artigos</a></li>
                        <li class="breadcrumb-item active">Artigo</li>
                    </ol>
                </div>
                <h4 class="page-title">Cadastro de Artigo</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <p class="text-muted font-14">
                    </p>
                    <form action="{{ route('admin.blog.store') }}" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="titulo">Titulo</label>
                                <input type="text" id="titulo" name="titulo" class="form-control" 
                                    value="{{ old('titulo') }}" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="subtitulo">Subtitulo</label>
                                <input type="text" class="form-control" id="subtitulo" name="subtitulo" value="{{ old('subtitulo') }}" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="autor">Autor</label>
                                <input type="text" id="autor" name="autor" class="form-control" 
                                    value="{{ old('autor') }}" required>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="ordem">Ordem</label>
                                <input type="number" class="form-control" min="0" id="ordem" name="ordem" value="{{ old('conteudo') }}" required/>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="revisao" >Status</label>
                                <select id="revisao" name="revisao" class="form-control" required>
                                    <option value="true" {{ old('status') == true ? 'selected' : '' }}>Rascunho</option>
                                    <option value="false" {{ old('status') == false ? 'selected' : '' }}>Publicado</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="img_background">Url Imagem</label>
                                <input type="text" class="form-control" id="img_background" name="img_background" value="{{ old('img_background') }}" />
                            </div>
                            <div class="form-group col-md-4">
                                <label for="tipo">Tipo do conteúdo</label>
                                <select id="tipo" name="tipo" class="form-control" required>
                                    <option value="">Selecione..</option>
                                    <option value="Dicas" {{  old('tipo') == "Dicas" ? 'selected' : '' }}>Dicas</option>
                                    <option value="Como jogar" {{ old('tipo')== "Como jogar" ? 'selected' : '' }}>Como jogar</option>
                                    <option value="Tutorial" {{ old('tipo') == "Tutorial" ? 'selected' : '' }}>Tutorial</option>
                                </select>
                            </div>
                            <div class="form-group col-lg-12 mt-1">
                                <label for="descricao">Conteúdo</label>
                                <textarea id="summernote-basic" name="conteudo" required> {{ old('conteudo') }}</textarea>
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