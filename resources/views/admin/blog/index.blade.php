@extends('admin.master.admin')
@section('title', 'Artigos Cadastrados')

@section('content')
    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Artigos</li>
                    </ol>
                </div>
                <h4 class="page-title">Artigos</h4>
            </div>
        </div>
    </div>
    <!-- end page title -->


    <div class="row">
        <div class="col-lg-12">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <a href="{{ route('admin.blog.create') }}" class="btn btn-primary btn-rounded mb-3"><i
                            class="mdi mdi-plus"></i> Cadastrar Artigo</a>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Artigos Cadastrados</h4>
                    <p class="text-muted font-14">

                    </p>
                    <div class="table-responsive">
                        <table class="table table-centered mb-0">
                            <thead>
                                <tr>
                                    <th>Status</th>
                                    <th>Data Criação</th>
                                    <th>Titulo</th>
                                    <th>Subtitulo</th>
                                    <th>Tipo</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($posts as $post)
                                    <tr>
                                        <td> <i
                                                class="mdi mdi-circle text-{{ $post->revisao == true ? 'warning' : 'success' }}"></i>{{ $post->revisao == true ? ' Rascunho' : ' Publicado' }}
                                        </td>
                                        <td>{{ date('d/m/Y H:m:s', strtotime($post->created_at)) }} </td>
                                        <td><a href="{{ route('admin.blog.edit', ['blog' => $post->id]) }}">
                                                {{ $post->titulo }}</td></a>
                                        <td>{{ $post->subtitulo }}</td>
                                        <td>{{ $post->tipo }}</td>
                                        <td class="table-action">
                                            <a href="{{ route('admin.blog.edit', ['blog' => $post->id]) }}"
                                                class="action-icon"> <i class="mdi mdi-pencil"></i></a>
                                            <a href="{{ route('admin.blog.destroy', [
    'blog' => $post->id,
]) }}"
                                                class="action-icon btn-excluir"> <i class="mdi mdi-delete"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
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

            $('.btn-excluir').click(function(e) {
                e.preventDefault(); // does not go through with the link.

                if (!confirm("Tem certeza que deseja remover esse item?")) {
                    return false;
                }

                var $this = $(this);

                $.post({
                    type: 'DELETE',
                    url: $this.attr('href')
                }).done(function(response) {
                    if (response.status == "success") {

                        Message(response.message);
                        location.reload();

                    } else if (response.status == "warning") {
                        Message(response.message);

                    } else {
                        Message(response.message);
                    }

                });
            });

        });

      

        // Montar a tabela para listar os dados pagina

    </script>

@endsection
