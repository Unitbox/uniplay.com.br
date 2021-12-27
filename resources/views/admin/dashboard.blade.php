@extends('admin.master.admin')
@section('title', 'Dashboard')
@section('content')

    <!-- start page title -->
    <div class="row">
        <div class="col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="javascript: void(0);">Home</a></li>
                        <li class="breadcrumb-item active">Dashboard</li>
                    </ol>
                </div>
                <h4 class="page-title">Dashboard</h4>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 col-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate tex-center" title="Campaign Sent">Partidas
                            </h5>
                            <h3 class="my-2 py-1">{{ $partidas }}</h3>

                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Deals">Partidas Concluídas</h5>
                            <h3 class="my-2 py-1">{{ $partidasConluidas }}</h3>  
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="New Leads">Jogadores</h5>
                            <h3 class="my-2 py-1">{{ $jogadores }}</h3>
                           
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->

        <div class="col-lg-6 col-xl-3">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Booked Revenue">Jogadores Anônimo
                               </h5>
                            <h3 class="my-2 py-1"> {{ $jogadoresAnonimos }}</h3>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> <!-- end col -->
        <div class="col-lg-6 col-xl-2">
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col-12">
                            <h5 class="text-muted font-weight-normal mt-0 text-truncate" title="Booked Revenue">Cartas
                               </h5>
                            <h3 class="my-2 py-1"> {{ $cartas }}</h3>
                            <h4 class="my-2 py-1"> Itens {{ $cartasItens }}</h4>
                        </div>
                    </div> <!-- end row-->
                </div> <!-- end card-body -->
            </div> <!-- end card -->
        </div> 
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped table-centered mb-0">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Qtd. Partidas Criadas</th>
                                        <th>Data Cadastro</th>
                                        <th>Último Login</th>
                                        <th>Anônimo</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($users as $user)
                                    <tr>
                                        <td class="table-user">
                                            <img src="{{ $user->avatar }} " alt="table-user" class="mr-2 rounded-circle" />
                                            {{$user->name}}
                                        </td>
                                        <td> {{ $user->quantidade_partida }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($user->created_at)) }}</td>
                                        <td>{{ date('d/m/Y H:i:s', strtotime($user->last_login_at)) }}</td>
                                        <td> {{ $user->anonimo == true ? "sim" : "não" }} </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                       
                   
                </div>
            </div>

        </div>
        
        
                                                        

    </div>

    <!-- end row -->
@endsection
