<?php

namespace App\Models\Api;

use Illuminate\Database\Eloquent\Model;

class Instagram extends Model
{
    public function getProfileInstagram(string $username) 
    {
        $url = 'https://www.instagram.com/' . $username . '/?__a=1';
      
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);        
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);

        $result = curl_exec($ch);
        curl_close($ch);

        $json = json_decode($result);

        dd($json);

        return $json;

    }
}
