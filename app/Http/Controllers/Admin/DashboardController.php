<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Carta;
use App\Models\Carta_Item;
use App\Models\Partida;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index ()
    {
        //$users = User::orderBy('last_login_at','desc')->get();

        $users = DB::table('users')
        ->join('partidas', 'users.id', '=', 'partidas.user_id')

        ->selectRaw('users.id, users.name, users.avatar, users.anonimo, users.created_at, users.last_login_at, count(partidas.id) as quantidade_partida ')
        ->groupBy('users.id', 'users.name', 'users.avatar', 'users.created_at', 'users.last_login_at', 'users.anonimo')
        //b.id, b.name, b.avatar, b.created_at, b.last_login_at, b.anonimo
        //->orderBy('count(partidas.id)', 'DESC')
        ->orderBy(DB::raw('count(partidas.id)'), 'DESC')
        ->get();

        $partidas = Partida::all()->count();
        $partidasConluidas = Partida::where('concluido', true)->get()->count();
        $jogadores = count($users->all());
        $jogadoresAnonimos = User::where('anonimo', true)->get()->count();
        $cartasItens = Carta_Item::all()->count();
        $cartas = Carta::all()->count();

        return view('admin.dashboard', [
            'partidas' => $partidas,
            'partidasConluidas' => $partidasConluidas,
            'jogadores' => $jogadores,
            'jogadoresAnonimos' => $jogadoresAnonimos,
            'cartas' => $cartas,
            'users' => $users,
            'cartasItens' => $cartasItens
        ]);
    }
}
