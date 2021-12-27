<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Carta_Item;

class CartaItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        
        // save no banco de dados usando Create
        $cartaItem = Carta_Item::create($data);
        
        if($cartaItem)
        {

            $carta_itens = Carta_Item::where('carta_id',$request->carta_id)->get();
            
            $response = [
                'status' => 'success',
                'data' => [
                    'cartas_itens' => $carta_itens,
                ],
                'message' => 'Item cadastrado!'
            ];
        } else {
            $response = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar o item, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
        }
        return response()->json($response);
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $idcarta = $_GET['idcarta'];

        $cartaItem = Carta_Item::where('id',$id)->delete();


        if($cartaItem)
        {
            $cartaItensRestantes = Carta_Item::where('carta_id',$idcarta)->get();
            $response = [
                'status' => 'success',
                'data' => [
                    'cartas_itens' => $cartaItensRestantes,
                ],
                'message' => 'Item removido com sucesso!'
            ];
        } else {
            $response = [
                'message' => 'Whoops, ocorreu um erro ao deletar o item, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
        }

        return response()->json($response);
    }
}
