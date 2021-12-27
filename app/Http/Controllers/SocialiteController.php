<?php

namespace App\Http\Controllers;

use App\SocialProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{

    public function redirectToProvider($provider)
    {
        if (!str_contains('facebook ', $provider) && !str_contains('google ', $provider)) {
            return redirect()->route('mimica.home');
        }
       
        return Socialite::driver($provider)->redirect();

    }

    public function handleProviderCallback($provider)
    {   
       // pesquisa usuario na classe das redes sociais
        try{
            $user = Socialite::driver($provider)->user();

        } catch (\Exception $e) {
            return redirect('/')
            ->with('status', 'Something went wrong or You have rejected the app!');
        }

        // verifica se existe o usuario
        $socialProvider = SocialProvider::where('provider_id', $user->getId())->first();
        
        // se o usuario nao existe na base, cadastra e loga.
        if (!$socialProvider) {

            if($provider == 'facebook')
            {
                // $user->getAvatar()- depreciado para facebook
                $urlAvatar = 'https://graph.facebook.com/v3.3/'. $user->id . '/picture?type=normal&access_token=' . $user->token;
            } else {
                $urlAvatar = $user->getAvatar();
            }

            // salva imagem do usuario no banco
            $pathImg = $this->SaveImgLocal($urlAvatar, $user->id);

            $users = User::create(
                [
                    'email' => $user->getEmail(),
                    'name' => $user->getName(),
                    'avatar' => $pathImg,
                    'anonimo' => false
                ]
            );

            if($users)
            {
                $users->socialProviders()->create(
                    [
                    'provider_id' => $user->getId(),
                    'provider' => $provider
                    ]
                );
            }

            Auth::guard('web')->login($users, false);

            $this->authenticated($this->getIp());
            
            return redirect()->route('mimica.configuracao');

        } else {
            $user_logged = $socialProvider->user()->first();

            if (!Auth::check()) {
                Auth::guard('web')->login($user_logged, true);

                $this->authenticated($this->getIp());
            }

            return redirect()->route('mimica.configuracao');
        }
    }


    public function loginAnonimo()
    {

        if (Auth::guard('web')->check()) 
        {
            return redirect()->route('mimica.configuracao');
        }
        return view('mimica.loginanonimo');
    }

    public function loginAnonimoPost(Request $request)
    {

        $email = $request->email;
        $name = $request->name;
        $termos = $request->termos;

        $validatedData = $request->validate([
            'email' => 'required|min:1|max:255|email',
            'name' => 'required|min:1|max:255',
            'termos'=> 'required'
        ]);

        // vefirica se o usuario existe
        $user = User::where('email', $email)->first();

        if($user) {
            
            $user->name = $name;
            $user->termo_aceite = true;
            $user->anonimo = true;
            $user->save();
            
            Auth::guard('web')->login($user, false);

            $this->authenticated($this->getIp());
            
            return redirect()->route('mimica.configuracao');

        } else {

            $users = User::create(
                [
                    'email' => $email,
                    'name' => $name,
                    'avatar' => "https://uniplay.com.br/template/assets/images/avatar-player1-mimics-uniplay.png",
                    'termo_aceite' => true,
                    'anonimo' => true
                ]
            );

            if($users)
            {
                $users->socialProviders()->create(
                    [
                        'provider_id' => "",
                        'provider' => "noprovider"
                    ]
                );

                Auth::guard('web')->login($users, false);
        
                $this->authenticated($this->getIp());
                
                return redirect()->route('mimica.configuracao');
            }
        }
    }

    private function SaveImgLocal($url, $nameFile) 
    {
        // salva a imagem usando Cropper, passar para a versao 2
        
        // if(empty($cover['path']) || !FacadesFile::exists('../public/storage/' . $cover['path'])) {
        //     return url(asset('backend/assets/images/realty.jpeg'));
        // }
        // return Storage::url(Cropper::thumb($cover['path'], 1366, 768));

        $contents = file_get_contents($url);

        Storage::put($nameFile . '.png', $contents);

        
        return Storage::url($nameFile . '.png');
    }

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


}
