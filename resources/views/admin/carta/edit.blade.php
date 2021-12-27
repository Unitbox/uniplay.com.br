@extends('admin.master.admin')
@section('title', 'Edição Carta')
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
                    <div class="page-title-box">
                        <div class="page-title-right">
                            <div class="col-12">
                                <a href="{{ route('admin.carta.create') }}" class="btn btn-primary btn-rounded mb-3"><i
                                        class="mdi mdi-plus"></i> Cadastrar Cartas</a>
                            </div>
                        </div>
                        <h4 class="header-title">Edite uma carta</h4>
                        <p class="text-muted font-14">
                            Edite a carta selecionada, remova e cadastre novos itens.
                        </p>

                    </div>
                    <form action="{{ route('admin.carta.update', ['cartum' => $carta->id]) }}" method="post">
                        @method('put')
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="carta">Carta</label>
                                <input type="text" name="carta" class="form-control" placeholder="ex. Primeira Carta"
                                    value="{{ $carta->carta }}">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="observacao">Observação</label>
                                <input class="form-control" id="observacao" value="{{ $carta->observacao }}"
                                    name="observacao" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="categoria_id" class="col-form-label">Categoria</label>
                                <select id="categoria_id" name="categoria_id" class="form-control">
                                    <option>Selecione um item</option>
                                    @foreach ($categorias as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $carta->categoria_id == $item->id ? 'selected' : '' }}>
                                            {{ $item->categoria }}
                                        </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="idioma_id" class="col-form-label">Idioma</label>
                                <select id="idioma_id" name="idioma_id" class="form-control">
                                    <option>Selecione um item</option>
                                    @foreach ($idiomas as $item)
                                        <option value="{{ $item->id }}"
                                            {{ $carta->idioma_id == $item->id ? 'selected' : '' }}>{{ $item->idioma }}
                                        </option>

                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="nivel_dificuldade_id" class="col-form-label">Dificuldade</label>
                                <select id="nivel_dificuldade_id" name="nivel_dificuldade_id" class="form-control">
                                    <option>Selecione um item</option>
                                    <option value="1" {{ $carta->nivel_dificuldade_id == 1 ? 'selected' : '' }}>Fácil
                                    </option>
                                    <option value="2" {{ $carta->nivel_dificuldade_id == 2 ? 'selected' : '' }}>Médio
                                    </option>
                                    <option value="3" {{ $carta->nivel_dificuldade_id == 3 ? 'selected' : '' }}>Difícil
                                    </option>
                                </select>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>

                    </form>

                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title">Adicione itens a esta carta</h4>
                    <p class="text-muted font-14">
                        Preencha o formulário e <code>vincule até 4 itens</code> a esta carta, lembre-se de <code>distribuir
                            todas ações e pontuações sem repiti-las</code>.
                    </p>
                    <form action="{{ route('admin.cartaItem.create') }}" id="form-carta-item" method="post">
                        @csrf
                        <div class="form-row">
                            <div class="form-group col-md-4">
                                <label for="texto">Palavra</label>
                                <input type="text" name="texto" class="form-control" placeholder="ex. Caneta" value=""
                                    id="texto">
                            </div>
                            <div class="form-group col-md-3">
                                <label for="pontuacao">Pontuação</label>
                                <select id="pontuacao" name="pontuacao" class="form-control">
                                    <option>Selecione um item</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="4">4</option>
                                </select>
                            </div>
                            <div class="form-group col-md-3">
                                <label for="acao">Ação</label>
                                <select id="acao" name="acao" class="form-control">
                                    <option>Selecione um item</option>
                                    <option value="Sou">Sou</option>
                                    <option value="Faço">Faço</option>
                                    <option value="Entretenimento">Entretenimento</option>
                                    <option value="Objeto">Objeto</option>
                                </select>
                            </div>
                            <div class="col-auto" style="margin-top:30px;">
                                <button type="button" onclick="CadastraCartaItem('{{ $carta->id }}')"
                                    class="btn btn-primary ">Incluir item</button>
                            </div>
                        </div>
                    </form>
                    <table class="table table-centered mb-0">
                        <thead>
                            <tr>
                                <th>Palavra</th>
                                <th>Pontuação</th>
                                <th>Ação</th>
                                <th>Data de criação</th>
                            </tr>
                        </thead>
                        <tbody class="itens-carta">
                            @foreach ($carta_itens as $item)
                                <tr>
                                    <td>{{ $item->texto }} </td>
                                    <td><span class="badge badge-primary">{{ $item->pontuacao }} pts</span></td>
                                    <td>{{ $item->acao }}</td>
                                    <td>{{ date('d/m/Y H:m:s', strtotime($item->created_at)) }} </td>
                                    <td class="table-action text-center">
                                        <a href="javascript: void(0);" id="btn{{ $item->id }}"
                                            data-id="{{ route('admin.cartaItem.destroy', ['cartaItem' => $item->id, 'idcarta' => $carta->id]) }}"
                                            onclick="RemoverItemCarta('{{ $item->id }}');">
                                            <i class="mdi mdi-delete"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
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

        function RemoverItemCarta(iditem) {

            var $this = this;
            var btnDelete = $('#btn' + iditem);

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
                        ListarItensCarta(response.data.cartas_itens);
                        Message(response.message);

                    } else if (response.status == "warning") {
                        Message(response.message);

                    } else {
                        Message(response.message);
                    }
                }
            });

        }


        function CadastraCartaItem(id) {
            var $this = this;
            var url = "{{ route('admin.cartaItem.store') }}";

            $.ajax({
                url: url,
                method: "POST",
                dataType: "json",
                data: {
                    "carta_id": id,
                    "texto": $("#texto").val(),
                    "pontuacao": $("#pontuacao").val(),
                    "acao": $("#acao").val(),
                },
                success: function(response) {
                    console.log(response);
                    if (response.status == "success") {
                        ListarItensCarta(response.data.cartas_itens);
                    } else {
                        alert(response.message);
                    }
                }

            });

        }

        function ListarItensCarta(data) {
            $('.itens-carta').html('');

            var html = "";
            $.each(data, function(index, value) {
                var url = "{{ route('admin.cartaItem.destroy', ['cartaItem' => 0, 'idcarta' => 1]) }}".replace('0',
                    value.id).replace('1', value.carta_id);
                html += "<tr>";
                html += "<td>" + value.texto + "</td>";
                html += "<td><span class=\"badge badge-primary\">" + value.pontuacao + " pts</span></td>";
                html += "<td>" + value.acao + "</td>";
                html += "<td>" + value.created_at + "</td>";
                html += "<td class=\"table-action text-center\">";
                html += "<a href=\"javascript: void(0);\" id=\"btn" + value.id + "\"";
                html += "data-id=\"" + url + "\"";
                html += "onclick=\"RemoverItemCarta(" + value.id + ");\">";
                html += "<i class=\"mdi mdi-delete\"></i></a>";
                html += "</td>";
                html += "<tr>";
            });

            $(".itens-carta").html(html);

        }
        // Montar a tabela para listar os dados pagina

    </script>

@endsection
