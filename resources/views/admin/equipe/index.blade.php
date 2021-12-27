@extends('admin.master.admin')
@section('title', 'Equipes Cadastradas')
@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Equipes</li>
                    </ol>
                </div>
                <h4 class="page-title">Equipe</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->

    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.equipe.create') }}" class="btn btn-primary btn-rounded mb-3"><i
                            class="mdi mdi-plus"></i> Cadastrar Equipe</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Equipes Cadastradas</h4>
                    <p class="text-muted font-14">
                        Tenha acesso a todas as equipes crie novas ou exclua uma equipe existente.
                    </p>
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Equipe</th>
                                <th>Data Criação</th>
                                <th>Data Atualização</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($equipes as $item)
                                <tr>
                                    <td>{{ $item->id }} </td>
                                    <td>{{ $item->equipe }}</td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($item->created_at)) }} </td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($item->updated_at)) }} </td>
                                    <td class="table-action text-center">
                                        <a href="javascript: void(0);" id="btn{{ $item->id }}" data-id="{{ route('admin.equipe.destroy', ['equipe' => $item->id ]) }}"
                                            onclick="RemoverEquipe('{{ $item->id }}');">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                    <td> 
                                        <a href="{{ route('admin.equipe.edit', ['equipe' => $item->id]) }}" data-id="">
                                            <i class="mdi mdi-pencil"></i>
                                        </a>
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

        function RemoverEquipe(idequipe) 
        {

            var $this = this;
            var btnDelete = $('#btn' + idequipe);

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
