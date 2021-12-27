<?php

namespace App\Http\Controllers\Mimica;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use App\Models\PartidaEquipe;
use App\Models\Partida;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class GameController extends Controller
{

    public function configuracao($codigo = null)
    {
        return view('mimica.configuracao');
    }
    public function cadastrarConfiguracaoPartida(Request $request)
    {
        $data = $request->all();

        $data['user_id'] = Auth::user()->id;
        $data['rodada'] = 2;
        $data['qtd_jogadores_equipe'] = 2;
    
        $this->LimparConfiguracoesJogo();
    
        $partida = Partida::create($data);
    
        if ($partida) {
            // modo de jogos: 1 - modo em equipe | 2 - modo livre
            // verifica o modo do jogo
            $modoJogo = $partida->categoria_id;
    
            if ($modoJogo == 1) {
                // salva a quantidade de jogadores por time para somar na quantidade de rodadas
                setcookie("qtd_jogadores", 2, time() + 60 * 60 * 24 * 7, "/");
                        
                return redirect()->route('mimica.configuracao.equipes', ['codigo' => $partida->id]);
            } else {
                return redirect()->route('mimica.partida.livre', ['codigo' => $partida->id]);
            }
        } else {
            $response = [
                    'status' => 'error',
                    'message' => 'Whoops, ocorreu um erro ao cadastrar a partida, por favor tente novamente mais tarde !',
                    'time'=> 6000
                ];
    
            return redirect()->route('mimica.configuracao')->with($response);
        }
    }

    public function equipes($codigo)
    {

        $this->LimparConfiguracoesJogo();
        $idusuario = Auth::user()->id;

        $partida = Partida::where('id', $codigo)
        ->where('user_id', $idusuario)->first();

        if (!$partida) {

            $response = [
                'status' => 'error',
                'message' => 'Partida escolhida não pertence ao seus jogos!'
            ];

            return redirect()->route('mimica.configuracao')->with($response);
        } else {

            $responseEquipe = $this->ListaEquipesPartida($codigo, $idusuario);

            if($responseEquipe) {
                $equipesDisponiveis = $responseEquipe['equipes_disponiveis'];
                $equipesEscolhidas = $responseEquipe['equipes_escolhidas'];
            }

            //dd(count($equipesEscolhidas));
    
            return view('mimica.equipe', [
                'codigo' => $codigo,
                'equipes'=> $equipesDisponiveis,
                'equipes_escolhidas' => $equipesEscolhidas
            ]);
        }
    }

    public function cadastrarEquipe(Request $request)
    {
        $idusuario = Auth::user()->id;
        $idpartida = $request->partida;

        $partidaCadastrada = PartidaEquipe::where('partida_id', $idpartida)
        ->where('equipe_id', $request->equipe)->first();

        if(!$partidaCadastrada) {
            $equipe = new PartidaEquipe();
            
            $equipe->partida_id = $idpartida;
            $equipe->user_id = $idusuario;
            $equipe->equipe_id = $request->equipe;
    
            if ($equipe->save()) {
                //dd("caiu aqui");
                // Retorna as equipes disponiveis e escolhidas
                $responseEquipe = $this->ListaEquipesPartida($idpartida, $idusuario);

                if($responseEquipe) {
                    $equipesDisponiveis = $responseEquipe['equipes_disponiveis'];
                    $equipesEscolhidas = $responseEquipe['equipes_escolhidas'];
                }
    
                $response = [
                    'status' => 'success',
                    'data' => [
                        'codigo' => $idpartida,
                        'equipes'=> $equipesDisponiveis,
                        'equipes_escolhidas' => $equipesEscolhidas
                    ],
                    'message' => 'Equipe adicionada a partida!'
                ];
            } else {
                $response = [
                    'status' => 'error',
                    'data' => [],
                    'message' => 'Whoops, estamos com problemas para realizar essa requisição, por favor tente novamente mais tarde!'
                ];
            }
        } else {
            $response = [
                'status' => 'warning',
                'data' => [],
                'message' => 'Whoops, essa equipe já foi inserida na partida, por favor escolha outra equipe e tente novamente!'
            ];
        }

        return response()->json($response);
    }

    public function excluirEquipePartida(Request $request)
    {
        $idusuariuo = Auth::user()->id;

        $partidaEquipe = PartidaEquipe::where('id', $request->id)
        ->where('partida_id', $request->partida)->delete();

        if($partidaEquipe) {

            $responseEquipe = $this->ListaEquipesPartida($request->partida, $idusuariuo);
    
            if($responseEquipe) {
                $equipesDisponiveis = $responseEquipe['equipes_disponiveis'];
                $equipesEscolhidas = $responseEquipe['equipes_escolhidas'];
            }

            $response = [
                'status' => 'success',
                'data' => [
                    'codigo' => $request->partida,
                    'equipes'=> $equipesDisponiveis,
                    'equipes_escolhidas' => $equipesEscolhidas
                ],
                'message' => 'Equipe removida da partida!'
            ];

        } else {

            $response = [
                'status' => 'success',
                'data' => [],
                'message' => 'Whoops, ocorreu um erro ao deletar a equipe, recarregue a página e tente novamente!'
            ];
        }

        return response()->json($response);
    }

    // salva os dados do jogo 
    public function startPartida(Request $request) 
    {
        $idusuario = Auth::user()->id;

        $equipesEscolhidas = PartidaEquipe::where('partida_id', $request->idpartida)
        ->Where('user_id', $idusuario)
        ->get();
        
        $qtdEquipesEscolhidas = ($equipesEscolhidas == null ? 0 : count($equipesEscolhidas));

        // min 2 partidas 
        // verifica se a partida possui mais de 1 uma equipe para iniciar
        if($qtdEquipesEscolhidas < 2) {

            $response = [
                'status' => 'fail',
                'data' => [],
                'message' => 'Selecione ao menos 2 times para iniciar a partida.'
            ];

            return response()->json($response);

        } else {
            // padrao do jogo sao 2 rodadas. 
            $rodada = 2;
            $qtdJogadores = $_COOKIE['qtd_jogadores'];

            // salvo as configuracoes da partida
            $this->RegistraConfiguracaoPartida($rodada, $qtdJogadores, $qtdEquipesEscolhidas);
            
            $response = [
                'status' => 'success',
                'data' => [],
                'message' => route('mimica.partida', ['codigo' =>  $request->idpartida])
            ];

            return response()->json($response);
        }
    }

    // salva configuracao do jogo // quantidade de jogadores e quantidade de rodadas
    private function RegistraConfiguracaoPartida(int $rodada, int $qtdJogadores, int $qtdTimes)
    {
        $rodadas = 2;
        $configRodada = ($qtdTimes * $qtdJogadores) * $rodadas;

        setcookie("config_partida", $configRodada, time() + 60 * 60 * 24 * 7, "/");
    }

    private function ListaEquipesPartida(int $idpartida, int $idusuario): ?Array
    {
        $equipesEscolhidas = DB::table('partidas_equipes')
        ->join('equipes', 'partidas_equipes.equipe_id', '=', 'equipes.id')
        ->where('user_id', $idusuario)
        ->where('partida_id', $idpartida)
        ->select('partidas_equipes.id', 'partidas_equipes.equipe_id', 'equipes.equipe', 'equipes.url_image')
        ->get();

        $partidaid = [];

        $maxQtdEquipes = 6; 
        $contadorEquipesEscolhidas = 0;
        foreach ($equipesEscolhidas as $partida) {
            $partidaid[] = $partida->equipe_id;
            $contadorEquipesEscolhidas ++; 
        }

        $qtdEquipesView = ($maxQtdEquipes - $contadorEquipesEscolhidas);

        $equipes = Equipe::whereNotIn('id', $partidaid)->inRandomOrder()->get()->take($qtdEquipesView);

        $data = [
            'equipes_disponiveis' => $equipes,
            'equipes_escolhidas' => $equipesEscolhidas
        ];

        return $data;
    }

    private function LimparConfiguracoesJogo()
    {
        // 1 configuracao 
        if (isset($_COOKIE['qtd_jogadores'])) {
            unset($_COOKIE['qtd_jogadores']);
            setcookie("qtd_jogadores", "", null, -1, '/');
        } 
        if (isset($_COOKIE['config_partida'])) {
            unset($_COOKIE['config_partida']); 
            setcookie('config_partida', null, -1, '/'); 
        } 
        if(session()->has('cartas')) {
            session()->forget('cartas');
        }
    }


    // TODO passar esses metodos para uma classe
    private function authenticated(string $ip)
    {
        $user = User::where('id', Auth::user()->id);
        $user->update([
            'last_login_at' => date('Y-m-d H:i:s'),
            'last_login_ip' => $ip
        ]);

    }

    private function getIp(){
        foreach (array('HTTP_CLIENT_IP', 'HTTP_X_FORWARDED_FOR', 'HTTP_X_FORWARDED', 'HTTP_X_CLUSTER_CLIENT_IP', 'HTTP_FORWARDED_FOR', 'HTTP_FORWARDED', 'REMOTE_ADDR') as $key){
            if (array_key_exists($key, $_SERVER) === true){
                foreach (explode(',', $_SERVER[$key]) as $ip){
                    $ip = trim($ip); // just to be safe
                    if (filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) !== false){
                        return $ip;
                    }
                }
            }
        }
        return request()->ip(); // it will return server ip when no client ip found
    }

    // public function pesquisaAmigos(Request $request)
    // {
    //     $data = [];

    //     if ($request->has('q')) {
    //         $search = $request->q;
    //         $data = User::select("id", "name", "avatar")
    //                 ->where('name', 'LIKE', "%$search%")->paginate(10);
    //     }
    //     return response()->json($data);
    // }

    // Metodo para jogar 1 de cada equipe
        // $ultimaEquipe = 3;
        // $equipe = session('equipe');
       
        // // reseto as equipes, para começar novamente as jogadas
        // if ($equipe >= $ultimaEquipe) {
        //     session()->put('equipe', 1);
        // }
        // else {
        //     $proximaEquipe = $equipe + 1;

        //     session()->put('equipe', $proximaEquipe);
    // }
    
}
