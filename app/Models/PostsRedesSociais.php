<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostsRedesSociais extends Model
{
    protected $table = "posts_redes_sociais";
    
    protected $fillable = [
        'idpost', 'media_url', 'media_type', 'permalink', 'thumbnail_url', 'username',
        'timestamp', 'description'
    ];

}
