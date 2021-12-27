<div id="top-modal" class="modal fade" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-top">
        <div class="modal-content">
            <div class="modal-header bg-success text-white p-0">
                <div class="text-center w-75 m-auto p-0">
                    <h3 class="font-weight text-center">SOBRE <br>
                        <span class="text-sm h5">v.1.1 </span> </h4>
                </div>
            </div>
            <div class="modal-body">
                <div class="text-center">
                    <div class="form-row d-flex justify-content-center">
                        <div class="form-group col-md-6 col-lg-6 col-sm-6">
                            <h4 class="mt-2">SONS</h4>
                            <input type="checkbox" id="sound" checked data-switch="success"
                                class="text-center float-left" />
                            <label for="sound"></label>
                        </div>

                        <div class="form-group col-md-6 col-lg-6 col-sm-6 ">
                            <h4 class="mt-2">TEMA ESCURO</h4>
                            <input type="checkbox" id="theme" data-switch="success" class="text-center float-left" />
                            <label for="theme"></label>
                        </div>
                    </div>
                    <div class="form-group col-md-12 col-lg-12 col-sm-12 d-flex justify-content-center">
                        <a href="javascript:void(0);" class="font-weight-bold text-success" onclick="abrirModalAjuda();"> 
                            <span class="h4 text-underline"> COMO JOGAR </span>
                            <br>
                            <span class="text-sm text-underline text-underline">Clique aqui para abrir o menu
                                ajuda</span>
                        </a>
                    </div>
                    <hr>
                    <h4 class="mt-3 font-weight-bold mb-3">INFORMAÇÕES</h4>

                    <div class="col-sm-12 col-md-12 col-lg-12 text-success">
                        <div class="mt-2">
                            <a href="{{ route('mimica.privacidade') }}"
                                class="mr-3 mb-2 font-weight-bold text-success" target="_blank">
                                <i class="dripicons-lock"></i> PRIVACIDADE
                            </a>
                            <a href="{{ route('mimica.termos') }}" class="mb-2 font-weight-bold text-success"
                                target="_blank">
                                <i class="dripicons-document"></i> TERMOS DE USO
                            </a>
                        </div>
                    </div>
                    <hr>

                    <h4 class="mt-3 font-weight-bold mb-3">REDES SOCIAIS</h4>
                    <div class="col-lg-12">
                        <ul class="social-list list-inline mt-3">
                            <li class="list-inline-item text-center">
                                <a href="https://www.instagram.com/mimicasonline/"
                                    class="social-list-item border-danger text-danger" target="_blank"><i
                                        class="mdi mdi-instagram"></i></a>
                            </li>
                            <li class="list-inline-item text-center">
                                <a href="javascript: void(0);" class="social-list-item border-danger text-danger"><i
                                        class="mdi mdi-youtube"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <div class="container">
                    <button class="btn btn-lg btn-success btn-rounded font-weight-bold col-lg-12 col-sm-12 col-md-12"
                        data-dismiss="modal"> <i class="dripicons-chevron-up float-left font-weight-bold">
                        </i>
                        FECHAR MENU</button>
                    <button
                        class="btn btn btn-link mt-3 text-center text-success col-lg-12 col-sm-12 col-md-12 btn_sair"
                        data-id="{{ route('mimica.home') }}">
                        <i class="dripicons-chevron-left float-left font-weight-bold">
                        </i>SAIR DA PARTIDA</button>
                </div>
            </div>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
