@extends('admin.master.admin')
@section('title', 'Cadastro Idioma')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.idioma.index') }}">Idiomas</a></li>
                        <li class="breadcrumb-item active">Idiomas</li>
                    </ol>
                </div>
                <h4 class="page-title">Idioma</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.idioma.create') }}" class="btn btn-primary btn-rounded mb-3"><i
                            class="mdi mdi-plus"></i> Cadastrar Idioma</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cadastre um idioma</h4>
                    <p class="text-muted font-14">
                        For basic styling—light padding and only horizontal dividers—add the base class <code>.table</code>
                        to any <code>&lt;table&gt;</code>.
                    </p>

                    <form action="{{ route('admin.idioma.store') }}" method="post">
                        @csrf
                        <div class="form-group">
                            <label for="simpleinput">Idioma</label>
                            <input type="text"  name="idioma" class="form-control" placeholder="ex. Inglês">
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>

    <!-- end row -->
@endsection
