@extends('admin.master.admin')
@section('title', 'Idiomas Cadastrados')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
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
                    <h4 class="header-title">Idiomas Cadastrados</h4>
                    <p class="text-muted font-14">
                        Tenha acesso a todos os idiomas crie novos ou exclua um idioma existente.
                    </p>
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Idioma</th>
                                <th>Data Criação</th>
                                <th>Data Atualização</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($idiomas as $idioma)
                                <tr>
                                    <td>{{ $idioma->id }} </td>
                                    <td>{{ $idioma->idioma }}</td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($idioma->created_at)) }} </td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($idioma->updated_at)) }} </td>
                                    <td class="table-action text-center">
                                        <a href="javascript: void(0);" id="btn{{ $idioma->id }}" data-id="{{ route('admin.idioma.destroy', ['idioma' => $idioma->id ]) }}"
                                            onclick="RemoverIdioma('{{ $idioma->id }}');">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>

    <!-- end row -->
@endsection

@section('js')

    <script>
        $(document).ready(function() {

            $.ajaxSetup({
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content")
                }
            });

        });

        function RemoverIdioma(ididioma) 
        {

            var $this = this;
            var btnDelete = $('#btn' + ididioma);

            var url = btnDelete.attr('data-id');

            if (!confirm('Tem certeza que deseja remover esse item?')) {
                return false;
            }

            $.ajax({
                url: url,
                method: "DELETE",
                dataType: "json",
                success: function(response) {
                    if (response.status == "success") {

                        Message(response.message);
                        location.reload();
                        // CRIAR FUNCTION PARA ATUALIZAR A TABELA
                    } else if (response.status == "warning") {
                        Message(response.message);

                    } else {
                        Message(response.message);
                    }
                }
            });

        }

        // Montar a tabela para listar os dados pagina

    </script>

@endsection
