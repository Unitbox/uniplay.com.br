<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Idioma;
use DateTime;
use DateTimeZone;
use Illuminate\Http\Request;

class IdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = Idioma::all();
        
        return view('admin.idioma.index', [
            'idiomas' => $idiomas
        ]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.idioma.create');
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
        $idioma = Idioma::create($data);

        if($idioma) {

            $message = [
                'message' => 'Idioma cadastrado com sucesso!',
                'status' => 'success' 
            ];
            return redirect()->route('admin.idioma.index')->with($message);

        } else {
            
            $message = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar o idioma, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
            return redirect()->route('admin.idioma.index')->with($message);
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

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {   
        $idioma = Idioma::where('id', $id)->delete(); 

        if($idioma)
        {
            $message = [
                'message' => 'Idioma removido com sucesso!',
                'status' => 'success' 
            ];
        } else {
            $message = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar o idioma, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
        }

        return response()->json($message);
    }
}
