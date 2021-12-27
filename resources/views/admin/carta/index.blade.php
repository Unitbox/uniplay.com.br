@extends('admin.master.admin')
@section('title', 'Cartas Cadastradas')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Cartas</li>
                    </ol>
                </div>
                <h4 class="page-title">Cartas</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.carta.create') }}" class="btn btn-primary btn-rounded mb-3"><i
                            class="mdi mdi-plus"></i> Cadastrar Cartas</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Cartas Cadastrados</h4>
                    <p class="text-muted font-14">
                        Tenha acesso a todas as cartas crie novas ou exclua uma carta existente.
                    </p>
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Carta</th>
                                <th>Categoria</th>
                                <th>Idioma</th>
                                <th>Dificuldade</th>
                                <th>Data Criação</th>
                                <th>Data Atualização</th>
                                <th></th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cartas as $carta)
                                <tr>
                                    <td>{{ $carta->id }} </td>
                                    <td>{{ $carta->carta }}</td>
                                    <td>{{ $carta->categoria }}</td>
                                    <td>{{ $carta->idioma }}</td>
                                    <td>{{ $carta->descricao }}</td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($carta->created_at)) }} </td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($carta->updated_at)) }} </td>
                                    <td class="table-action text-center">
                                        <a href="javascript: void(0);" id="btn{{ $carta->id }}"
                                            data-id="{{ route('admin.carta.destroy', ['cartum' => $carta->id]) }}"
                                            onclick="RemoverCarta('{{ $carta->id }}');">
                                            <i class="mdi mdi-delete"></i></a>

                                    </td>
                                    <td> 
                                        <a href="{{ route('admin.carta.edit', ['cartum' => $carta->id]) }}" data-id="">
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

        function RemoverCarta(idcarta) {

            var $this = this;
            var btnDelete = $('#btn' + idcarta);

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
