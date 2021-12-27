<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Equipe;
use Illuminate\Http\Request;
use DateTime;
use DateTimeZone;

class EquipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $equipes = Equipe::all();

        return view('admin.equipe.index', [
            'equipes' => $equipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.equipe.create');
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
        $equipe =  Equipe::create($data);

        if ($equipe) {

            $message = [
                'message' => 'Equipe cadastrada com sucesso!',
                'status' => 'success'
            ];
            return redirect()->route('admin.equipe.index')->with($message);
        } else {

            $message = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar a equipe, por favor tente novamente mais tarde!',
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
        $equipe = Equipe::where('id', $id)->first();
        
        return view('admin.equipe.edit', [
            'equipe' => $equipe,
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
        $nome_equipe = $request->input('equipe');
        $imagem = $request->input('url_image');
        $equipe = Equipe::where('id',$id)->first();
        $equipe->equipe = $nome_equipe;
        $equipe->url_image = $imagem;

        
        if ($equipe->save()) {

            $message = [
                'message' => 'Equipe atualizada com sucesso!',
                'status' => 'success'
            ];
            return redirect()->route('admin.equipe.index')->with($message);
        } else {

            $message = [
                'message' => 'Whoops, ocorreu um erro ao atualizar a equipe, por favor tente novamente mais tarde!',
                'status' => 'fail'
            ];
            return redirect()->route('admin.equipe.index')->with($message);
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
        $equipe = Equipe::where('id', $id)->delete();

        if ($equipe) {
            $message = [
                'message' => 'Equipe removida com sucesso!',
                'status' => 'success'
            ];
        } else {
            $message = [
                'message' => 'Whoops, ocorreu um erro ao deletar a Equipe, por favor tente novamente mais tarde!',
                'status' => 'fail'
            ];
        }

        return response()->json($message);
    }
}
