<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();


        return view('admin.blog.index', ['posts' => $posts ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.blog.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->merge(["slug"=>Str::slug($request->titulo, '-')]);
        $data = $request->all();
        
        $artigo = Post::create($data);

        if($artigo) {
            $message = [
                'message' => 'Dados cadastrados com sucesso!',
                'status' => 'success' 
            ];
            return redirect()->route('admin.blog.edit', ['blog' => $artigo->id ])->with($message);

        } else {
            
            $message = [
                'message' => 'Whoops, ocorreu um erro ao cadastrar, por favor tente novamente mais tarde!',
                'status' => 'fail' 
            ];
            return redirect()->route('admin.blog.index')->with($message);
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
        $artigo = Post::where('id', $id)->first();

        if($artigo) {

            return view('admin.blog.edit', [ 
                'artigo' => $artigo
            ]);
        } else {
            $message = [
                'message' => 'Artigo escolhido não existe!',
                'status' => 'danger' 
            ];

            return redirect()->route('admin.blog.index')->with($message);
        } 
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
        $artigo = Post::where('id', $id)->first();

        
        if($artigo) {
            $request->merge(["slug"=>Str::slug($request->titulo, '-')]);
            $artigo->fill($request->all());
            $artigo->save();
    
            $message = [
                'message' => 'Dados atualizados com sucesso!',
                'status' => 'success' ];
    
                return redirect()->route('admin.blog.edit', [
                    'blog' => $artigo->id
                ])->with($message);

        } else {
            $message = [
                'message' => 'Ocorreu um erro ao salvar os dados escolhidos, por favor tente novamente mais tarde!',
                'status' => 'danger'
            ];

            return redirect()->route('admin.edit.index', ['blog' => $artigo->id])->with($message);
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
        $artigo = Post::where('id', $id)->delete();

        if ($artigo) {
            $message = [
                'message' => 'Cadastro removido com sucesso',
                'status' => 'success'];
        } else {
            $message = [
                'message' => 'Estamos com problemas para enviar a solicitação, por favor tente novamente mais tarde!',
                'status' => 'danger' ];
        }

        return response()->json($message);
    }
}
