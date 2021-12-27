<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use App\Models\Carta;
use App\Models\Carta_Item;
use App\Models\Categoria;
use App\Models\Idioma;

class CartaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cartas = DB::table('cartas')
        ->join('categorias', 'cartas.categoria_id', '=', 'categorias.id')
        ->join('idiomas', 'cartas.idioma_id', '=', 'idiomas.id')
        ->join('dificuldades', 'cartas.nivel_dificuldade_id', '=', 'dificuldades.id')
        ->select('cartas.carta','cartas.created_at','cartas.id','cartas.updated_at', 'categorias.categoria', 'idiomas.idioma','dificuldades.descricao')
        ->get();


        return view('admin.carta.index',[
           'cartas' => $cartas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = Categoria::all();
        $idiomas = Idioma::all();

        return view('admin.carta.create',[
            'categorias'=>$categorias,
            'idiomas'=>$idiomas,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        $carta = Carta::create($data);

        if($carta) {
            $message = [
                'message' => 'Carta cadastrada com sucesso!',
                'status' => 'success' 
            ];
            return redirect()->route('admin.carta.edit', ['cartum' => $carta->id])->with($message);

        } else {
            
            $message = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar a carta, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
            return redirect()->route('admin.carta.index')->with($message);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $carta = Carta::where('id',$id)->first();
        $carta_itens = Carta_Item::where('carta_id',$id)->get();
        $categorias = Categoria::all();
        $idiomas = Idioma::all();
  
        return view('admin.carta.edit',[
            'carta' => $carta,
            'categorias'=>$categorias,
            'idiomas'=>$idiomas,
            'carta_itens'=>$carta_itens,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

     //TODO melhorar o esquema de pegar item a item e declarar em variaveis diferentes
    public function update(Request $request, $id)
    {
        $carta_texto = $request->input('carta');
        $observacao = $request->input('observacao');
        $categoria_id = $request->input('categoria_id');
        $idioma_id = $request->input('idioma_id');
        $nivel_dificuldade_id = $request->input('nivel_dificuldade_id');

        $carta = Carta::where('id',$id)->first();
        $carta->carta = $carta_texto;
        $carta->observacao = $observacao;
        $carta->categoria_id = $categoria_id;
        $carta->idioma_id = $idioma_id;
        $carta->nivel_dificuldade_id = $nivel_dificuldade_id;


        if ($carta->save()) {

            $message = [
                'message' => 'Carta atualizada com sucesso!',
                'status' => 'success'
            ];
            return redirect()->route('admin.carta.edit',['cartum' =>$id])->with($message);
        } else {

            $message = [
                'message' => 'Whoops, ocorreu um erro ao atualizar a carta, por favor tente novamente mais tarde!',
                'status' => 'fail'
            ];
            return redirect()->route('admin.carta.edit',['cartum' =>$id])->with($message);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carta = Carta::where('id',$id)->delete();

        if($carta)
        {
            $message = [
                'message' => 'Carta removida com sucesso!',
                'status' => 'success' 
            ];
        } else {
            $message = [
                'message' => 'Whoops, ocorreu um erro ao deletar a Carta, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
        }

        return response()->json($message);
    }
}
