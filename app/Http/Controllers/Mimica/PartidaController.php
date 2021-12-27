<?php

namespace App\Http\Controllers\Mimica;

use App\Models\Carta;
use App\Models\Carta_Item;
use App\Http\Controllers\Controller;
use App\Models\PartidaEquipe;
use App\Models\Partida;
use App\Models\Equipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PartidaController extends Controller
{
    // TODO retornar a rodada com o nome dinamico - primeira Rodada, segunda Rodada, terceira Rodada...

    //SESSIONS
    //session()->get('cartas');
    //session()->get('rodada') 

    public function partidaLivre($codigo)
    {
       return view('mimica.partidalivre', ['codigo' => $codigo]);
    }

    public function proximaCarta($codigo)
    {
        $idusuario = Auth::user()->id;
        $partida = Partida::where('id', $codigo)->where('user_id', $idusuario)->first();

        $cartasJogadas = session()->get('cartas');
        $carta = Carta::where('nivel_dificuldade_id', $partida->dificuldade_id)->whereNotIn('id', $cartasJogadas == null ? [0] : $cartasJogadas)
                ->inRandomOrder()->first();

        session()->put('carta_selecionada', $carta->id);

        if ($carta != null) {
            $this->atualizaCartasJogadas($carta->id);

            // TODO inserir ordem nas cartas
            $cartasItem = Carta_Item::where('carta_id', $carta->id)->get();

            $response = [
                    'status' => 'success',
                    'data' => $cartasItem,
                    'message' => ''
                ];
        } else {
            $response = [
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Ops as cartas acabaram! Estamos trabalhando para aumentar a quantidade, obrigado por jogar!'
                ];
        }

        return response()->json($response);
    }


    public function partida($codigo)
    {
        return view('mimica.partida', ['codigo' => $codigo]);
    }

    public function listaPartida($codigo)
    {
        
        $idusuario = Auth::user()->id;
        $partida = Partida::where('id', $codigo)->where('user_id', $idusuario)->first();

        if (!$partida) {
            $response = [
                'status' => 'error',
                'message' => 'Partida escolhida não pertence ao seus jogos!',
                'data' => route('mimica.configuracao')
            ];

            Session::flash('message', 'Partida não encontrada, crie uma nova partida para iniciar um jogo!');
            Session::flash('status', 'warning');

            return response()->json($response);
        } else if ($partida->conluido) {

            $response = [
                'status' => 'error',
                'message' => 'Essa partida já foi concluída! Crie uma nova partida para jogar novamente!',
                'data' => route('mimica.configuracao')
            ];

            Session::flash('message', 'Essa partida já foi concluída! Crie uma nova partida para jogar novamente!');
            Session::flash('status', 'warning');

            return response()->json($response);
        } else {
            //lista a equipe escolhida da rodada
            $equipeEscolhida =  $this->listaEquipedaVezRodada($partida->id);

            $response = [
                'status' => 'success',
                'message' => '',
                'data' => $equipeEscolhida
            ];

            return response()->json($response);
        }
    }

    //TODO melhorar desempenho da chamada
    public function listaEquipedaVezRodada($partida)
    {
        $idusuario = Auth::user()->id;

        $equipesEscolhidas = DB::table('partidas_equipes')
            ->join('equipes', 'partidas_equipes.equipe_id', '=', 'equipes.id')
            ->where('partidas_equipes.partida_id', $partida)
            ->where('partidas_equipes.user_id', $idusuario)
            ->select('partidas_equipes.id', 'partidas_equipes.equipe_id', 'partidas_equipes.rodada_partida_vez', 'equipes.equipe', 'equipes.url_image', 'partidas_equipes.pontos')
            ->orderBy('partidas_equipes.rodada_partida_vez', 'ASC')
            ->orderBy('partidas_equipes.id', 'ASC')
            ->first();

        return $equipesEscolhidas;
    }

    public function proximaPartida($idPartidaEquipe)
    {
        // limpa carta selecionada pela ultima equipe
        session()->forget('carta_selecionada');
        $configRodadaPartida = ($_COOKIE['config_partida'] ?? 1);

        $equipeRodada = $this->marcaRodadaParaEquipe($idPartidaEquipe);

        // verifica se houve algum problema com a equipe da vez
        if (!$equipeRodada) {
        } else {
            //TODO Melhorar método de conferir se a partida encerrou
            // Passo 1 verifica se a partida da vez está acabando
            if ($equipeRodada->rodada_partida_vez >= $configRodadaPartida) {

                $partidasEquipe = PartidaEquipe::where('partida_id', $equipeRodada->partida_id)->get();
                $qtdEquipe = count($partidasEquipe);

                $contador = 0;
                foreach ($partidasEquipe as $key => $value) {
                    if ($value->rodada_partida_vez >= $configRodadaPartida) {
                        $contador++;
                    }
                }

                if ($contador == $qtdEquipe) {
                    // marca partida como concluido 
                    $this->marcarPartidaComoConcluido($equipeRodada->partida_id);

                    $response = [
                        'status' => 'success',
                        'message' => '',
                        'concluido' => route('mimica.partida.ganhador', ['codigo' => $equipeRodada->partida_id])
                    ];

                    return response()->json($response);
                } else {
                    $response = [
                        'status' => 'success',
                        'message' => '',
                        'concluido' => false
                    ];

                    return response()->json($response);
                }
            } else {
                $response = [
                    'status' => 'success',
                    'message' => '',
                    'concluido' => false
                ];

                return response()->json($response);
            }
        }
    }

    public function listaCartas($codigo)
    {
        //verifica a carta que o usuário esta jogando
        $cartaRodada = session()->get('carta_selecionada');
        $idusuario = Auth::user()->id;
        $partida = Partida::where('id', $codigo)->where('user_id', $idusuario)->first();

        if ($cartaRodada) {
            $carta = Carta::where('id', $cartaRodada)->where('nivel_dificuldade_id',$partida->dificuldade_id)->first();
            $cartasItem = Carta_Item::where('carta_id', $carta->id)->orderBy('ordem', 'ASC')->get();

            $response = [
                'status' => 'success',
                'data' => $cartasItem,
                'message' => ''
            ];
        } else {

            //TODO CONFIGURAR CARTAS SELECIONADAS NA CONFIGURACAO DO JOGO
            // $idusuario = Auth::user()->id;
            // $partida = Partida::where('id', 147)->where('user_id', $idusuario)->first();

            $cartasJogadas = session()->get('cartas');
            $carta = Carta::where('nivel_dificuldade_id',$partida->dificuldade_id)->whereNotIn('id', $cartasJogadas == null ? [0] : $cartasJogadas)
                ->inRandomOrder()->first();

            session()->put('carta_selecionada', $carta->id);

            if ($carta != null) {
                $this->atualizaCartasJogadas($carta->id);

                // TODO inserir ordem nas cartas
                $cartasItem = Carta_Item::where('carta_id', $carta->id)->get();

                $response = [
                    'status' => 'success',
                    'data' => $cartasItem,
                    'message' => ''
                ];
            } else {
                $response = [
                    'status' => 'fail',
                    'data' => [],
                    'message' => 'Ops as cartas acabaram! Estamos trabalhando para aumentar a quantidade, obrigado por jogar!'
                ];
            }
        }

        return response()->json($response);
    }

    public function ganhador(int $codigo)
    {
        $idusuario = Auth::user()->id;
        $partida = Partida::where('id', $codigo)
            ->where('user_id', $idusuario)->first();

        if (!$partida) {

            $response = [
                'status' => 'warning',
                'message' => 'Partida não encontrada, crie uma nova partida para iniciar um jogo!'
            ];

            return redirect()->route('mimica.configuracao')->with($response);
        } else {

            // confere se a partida encerrou
            if (!$partida->concluido) {
                return redirect()->route('mimica.partida', ['codigo' => $partida->id]);
            } else {

                // Seleciona um suposto ganhador
                //TODO fazer um join com a equipe para voltar a imagem


                /*                 $ganhadorPartida = DB::table('partidas_equipes')
                    ->join('equipes', 'partidas_equipes.equipe_id', '=', 'equipes.id')
                    ->select('partidas_equipes.id', 'partidas_equipes.pontos', 'equipes.url_image', 'equipes.equipe')
                    ->where('partidas_equipes.partida_id', $codigo)
                    ->orderBy('partidas_equipes.pontos', 'DESC')->get();

                dd($ganhadorPartida); */


                $ganhadorPartida =  PartidaEquipe::where('partida_id', $codigo)->orderBy('pontos', 'DESC')->first();


                $equipesPartida = PartidaEquipe::where('partida_id', $codigo)
                    ->where('id', '!=', $ganhadorPartida->id)
                    ->get();

                $ganhador = [];
                $empate = false;

                foreach ($equipesPartida as $key => $value) {

                    // verifica se houve empate
                    if ($ganhadorPartida->pontos == $value->pontos) {
                        $ganhador[] = $value;

                        $empate = true;
                    }
                }

                $ganhador[] = $ganhadorPartida;
                $equipesVencedoras = [];

                foreach ($ganhador as $value) {
                    $equipesVencedoras[] = $value->equipe_id;
                }


                $equipeCampea =  Equipe::whereIn('id', $equipesVencedoras)->get();


                return view('mimica.ganhador', [
                    'equipeCampea' => $equipeCampea,
                    'pontos' => $ganhadorPartida->pontos,
                    'empate' => $empate,
                ]);
            }
        }
    }

    // marca a rodada da vez para a equipe e verifica a rodada atual  
    private function marcaRodadaParaEquipe($idPartidaEquipe): ?PartidaEquipe
    {
        $idusuario = Auth::user()->id;
        $equipe = PartidaEquipe::where('id', $idPartidaEquipe)->where('user_id', $idusuario)->first();

        if ($equipe) {

            $rodadaAtual = $equipe->rodada_partida_vez;
            $novaRodada = $rodadaAtual + 1;
            $equipe->rodada_partida_vez = $novaRodada;
            $equipe->save();
        }
        return $equipe;
    }

    public function marcarPontos(Request $request)
    {
        $idusuario = Auth::user()->id;

        $equipe = PartidaEquipe::where('id', $request->idJogada)->Where('user_id', $idusuario)
            ->first();

        if (!$equipe) {

            $response = [
                'status' => 'fail',
                'data' => '',
                'message' => 'Ops, estamos com problemas para executar essa ação, por favor recarregue a página e tente novamente!'
            ];
        } else {
            $equipe->pontos = ($equipe->pontos + $request->pontos);

            if ($equipe->save()) {
                $response = [
                    'status' => 'success',
                    'data' => $equipe->getAttributes(),
                    'message' => ''
                ];
            } else {
                $response = [
                    'status' => 'fail',
                    'data' => '',
                    'message' => 'Ops, estamos com problemas para executar essa ação, por favor recarregue a página e tente novamente!'
                ];
            }
        }
        return response()->json($response);
    }

    private function atualizaCartasJogadas($idcarta)
    {
        if (session('cartas') == null) {
            session()->put('cartas', []);
            session()->push('cartas', $idcarta);
        } else {
            session()->push('cartas', $idcarta);
        }
    }

    private function marcarPartidaComoConcluido(int $idparida)
    {
        $partida = Partida::where('id', $idparida)
            ->first();

        $partida->concluido = true;
        $partida->save();
    }
}
