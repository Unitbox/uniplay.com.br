<?php

namespace App\Http\Controllers\Mimica;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function blog()
    {
        $posts = Post::where('revisao', false)->get();

        return view('mimica.blog.index', [
            'posts' => $posts
        ]);

    }

    public function search(Request $request)
    {
        $request->validate([
            'pesquisa_post' => 'max:255',
        ]);

        $posts =  Post::where('titulo', 'like', '%' . $request->pesquisa_post . '%')->where('revisao', false)->get();
        
        return view('mimica.blog.index', [
            'posts' => $posts,
            'resultado' => $request->pesquisa_post
        ]);

    }

    public function artigo(string $slug) 
    {
        $artigo = Post::where('slug', $slug)->where('revisao', false)->first();

        if($artigo) {

            $artigo->quantidade_acesso = ($artigo->quantidade_acesso + 1);
            $artigo->save();
    
            $posts = Post::where('revisao', false)->whereNotIn('id', [$artigo->id])->get();

            return view('mimica.blog.artigo', [
                'artigo' => $artigo,
                'posts' => $posts
            ]);
        } else {
            return redirect()->route('mimica.blog');
        }

    }
}
