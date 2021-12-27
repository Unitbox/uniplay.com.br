<?php

namespace App\Http\Controllers\Mimica;

use App\Http\Controllers\Controller;
use App\Http\Requests\web\FaleConosco;
use App\Models\Api\Customer;
use App\Models\Api\Instagram;
use App\Models\Api\Order;
use App\Models\Api\OrderDetail;
use App\Models\Api\Products;
use App\Models\Post;
use App\Models\PostsRedesSociais;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Curl\Curl;

class WebController extends Controller
{
    public function home()
    {

        //cache ranking
        if (Cache::has('ranking')) {
            $usersRanking = Cache::store('file')->get('ranking');
        } else {
            $usersRanking = DB::table('users')
            ->join('partidas_equipes', 'users.id', '=', 'partidas_equipes.user_id')
            ->selectRaw('name, avatar, users.id, sum(pontos) pontos, count(partida_id) qtd_partida')
            ->where('users.anonimo', false)
            ->groupBy('users.id', 'users.name', 'users.avatar')
            ->orderBy('pontos', 'DESC')
            ->get()->take(10);

            Cache::store('file')->put('ranking', $usersRanking, now()->addDay(1));
        }

        // cache posts
        if (Cache::has('posts')) {
            $posts = Cache::store('file')->get('posts');
        } else {
            $posts = Post::where('revisao', 'false')->orderBy('created_at', 'DESC')->get();

            Cache::store('file')->put('posts', $posts, now()->addDay(7));
        }

        $comoFunciona = [];
        $dicaseTutoriais = [];
        foreach ($posts as $post) {
            if ($post->tipo == "Como jogar") {
                $comoFunciona[] = $post;
            } else {
                $dicaseTutoriais[] = $post;
            }
        }
        

        // cache posts
        if (Cache::has('posts_instagram')) {
            $midias = Cache::store('file')->get('posts_instagram');
        } else {
            $midias = PostsRedesSociais::where('media_type', 'VIDEO')->orderBy('timestamp', 'DESC')->get();

            Cache::store('file')->put('posts_instagram', $midias, now()->addMinute(60));
        }
        return view('mimica.home', [
            'ranking' => $usersRanking,
            'posts' => $dicaseTutoriais,
            'comoFunciona' => $comoFunciona,
            'midias' => $midias
        ]);
    }

    public function privacidade()
    { 
        return view('mimica.privacidade.privacidade');
    }

    public function termosDeUso()
    { 
        return view('mimica.privacidade.termosdeuso');
    }


    
    // public function instagramUpdate()
    // {
    
    //     $urlInstagram = 'https://www.instagram.com/mimicasonline/?__a=1';

    //     $ch = curl_init($urlInstagram);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    //     curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
 
    //     $response = curl_exec($ch);
    //     curl_close($ch);

    //     $jsonPosts = json_decode($response);

    //     $posts = $jsonPosts->graphql->user->edge_owner_to_timeline_media->edges;

    //     $data = [];
    //     foreach ($posts as $post) {
    //         // separa os videos e salva em um array
    //         if($post->node->is_video) {

    //             $data[] = [
    //                 'node' => [
    //                     'id' => $post->node->id,
    //                     'video_url' => (isset($post->node->video_url) != null ? $post->node->video_url : ''),
    //                     'dimension' => $post->node->dimensions,
    //                     'is_video' => $post->node->is_video,
    //                     'display_url' => $post->node->display_url,
    //                     'owner' => $post->node->owner->username,
    //                     'views_video' => (isset($post->node->video_view_count) != null ? $post->node->video_view_count : ''),
    //                     'text' => $post->node->edge_media_to_caption,
    //                     'likes' => $post->node->edge_media_preview_like->count,
    //                     'comments' => $post->node->edge_media_to_comment->count
    //                 ]
    //             ];
    //         }
    //     }

    //     $videos = [
    //         'data' => $data
    //     ];
    //     // valida se ha alguma postagem nova no instagram
    //     foreach($videos as $video) {

    //         foreach($video as $posts) {
                
    //             foreach ($posts as $post) {
    //                 // confere se existe o post
    //                 $postsRedes = PostsRedesSociais::where('idpost', $post['id'])->first();
                    
    //                 if (!$postsRedes) {
                        
    //                     // faz o download do video e salva em uma pasta
    //                     $url_video = $post['video_url'];

    //                     $contents = file_get_contents($url_video);

    //                     Storage::put($post['id'] . '.mp4', $contents);
                        
    //                     $url_video_baixado = Storage::url($post['id'] . '.mp4');

    //                     $arraypost = 
    //                         [
    //                             'idpost' => $post['id'],
    //                             'video_url' => $url_video_baixado,
    //                             'is_video' => $post['is_video'],
    //                             'display_url' => $post['display_url'],
    //                             'criador' => $post['owner'],
    //                             'views_video' => $post['views_video'],
    //                             'likes' => $post['likes'],
    //                             'comments' => $post['comments']
    //                         ];

    //                     $postSave = PostsRedesSociais::create($arraypost);
    //                     $postSave->save();

    //                 }
    //             }
    //         }

    //     }

    //     return response()->json("okay");
    // }

    // <a
    // href="https://api.instagram.com/oauth/authorize?client_id=358828765430773&redirect_uri={{ route('token.instagram')}}&scope=&scope=user_profile,user_media&response_type=code">CLIQUE
    //  AQUI </a>

    public function listPostsInstagram() 
    {

        $longToken = 'IGQVJWZAjg2bmFrRDRiSkgwY3JCNGpGaHBFeXAyUkFpWEJJQ2dyLV9Od0lzc01RUDBBbVRLbWMwZAnIyd1U5RW5BODdNNWpZAYzlQamtwcE1NMEtHdDJqSlB6VkJXZAlVvQ2M4ZADdfZAFRR';    

        $url = "https://graph.instagram.com/17841435968710312/media?fields=id,caption,media_type,media_url,permalink,thumbnail_url,timestamp,username&access_token={$longToken}";

        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $response = curl_exec($ch);
        curl_close($ch);

        $jsonPosts = json_decode($response);
        //dd($jsonPosts);

        if (!empty($jsonPosts)) {

            PostsRedesSociais::where('id', '>', 1)->delete();
    
            foreach ($jsonPosts as $post) {
                foreach ($post as $item) {
                    if(isset($item->media_type)) 
                    {
                        if (isset($item->id)) {

                                $arraypost = [
                                    'idpost' => $item->id,
                                    'caption' => (isset($item->caption) != null ? $item->caption: ''),
                                    'media_type' => $item->media_type,
                                    'media_url' => $item->media_url,
                                    'permalink' => $item->permalink,
                                    'thumbnail_url' => (isset($item->thumbnail_url) != null ? $item->thumbnail_url : ''),
                                    'timestamp' => $item->timestamp,
                                    'username' => $item->username,
                                    'description' => (isset($item->caption) != null ? $item->caption: '')
                                ];
        
                                $postSave = PostsRedesSociais::create($arraypost);
                                $postSave->save();
                            
                        }
                    }
                }
            }
        }

        return response()->json("okay");
    }



    public function getLongToken() 
    {

        $code =  $_GET['code'];

        $urlRedirect = route('token.instagram');
        $url = 'https://api.instagram.com/oauth/access_token';
    
        $params = [
            'app_id' => '358828765430773',
            'app_secret' => '20e688134a8e87118530c044b3e70384',
            'grant_type' => 'authorization_code',
            'redirect_uri' => $urlRedirect,
            'code' => $code
        ];
        
        // pegar o token de curta de duracao  
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $params);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    
        $result = curl_exec($ch);
        curl_close($ch);
    
        $json = json_decode($result);
    
        $short_token = $json->access_token;
        $user_id = $json->user_id;

        var_dump($user_id);
        //17841400266674866 --leonardoaugustus
        //17841435968710312
    
        $urlLongToken = "https://graph.instagram.com/access_token?grant_type=ig_exchange_token&client_secret=20e688134a8e87118530c044b3e70384&access_token={$short_token}";
    
    
        $ch_1 = curl_init($urlLongToken);
        curl_setopt($ch_1, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch_1, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($ch_1, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch_1, CURLOPT_FOLLOWLOCATION, 1);
    
        $response = curl_exec($ch_1);
        curl_close($ch_1);
    
        $jsonPosts = json_decode($response);
    
        dd($jsonPosts);

// +"access_token": "IGQVJWWUVURTd6ZA0tNekVfVnVJSVFBSGZAjdDBGV3lubHYzQW1uRUNYa2ozcWFfTVZAKVnVKMEd6YWhOSHh5QkhLbXpGTTNEUEpHYWpUQ1picWRQWE9BWmlpZA2RMcUV4MmtodGhjbTdB"
// +"token_type": "bearer"
// +"expires_in": 5183877
    
        //expires_in": 5184000
        //access_token": "IGQVJXdkh5RldJeVNIRlJYZADZAxd05tM0pGSWwzQkdDX0g4bU45TkhKT1lURXQxdklOLVdxSjJUTi1tcWRBR1hQT09iRkpLUDE1c2JqdTMzMF9lY1doTl91eG8tbi1ZASnJXTzhMcWpB
   
        
    }



}
