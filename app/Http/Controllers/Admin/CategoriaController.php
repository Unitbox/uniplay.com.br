<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = Categoria::all();

        return view('admin.categoria.index', [
            'categorias' => $categorias
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.categoria.create');
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

        $categoria = Categoria::create($data);

        if($categoria) {

            $message = [
                'message' => 'Categoria cadastrada com sucesso!',
                'status' => 'success' 
            ];
            return redirect()->route('admin.categoria.index')->with($message);

        } else {
            
            $message = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar a categoria, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
            return redirect()->route('admin.categoria.index')->with($message);
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
        $categoria = Categoria::where('id',$id)->delete();
        
        if($categoria)
        {
            $message = [
                'message' => 'Categoria removida com sucesso!',
                'status' => 'success' 
            ];
        } else {
            $message = [
                'message' => 'Whoops, ocorreu um erro ao deletar a categoria, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
        }

        return response()->json($message);
    }
}
