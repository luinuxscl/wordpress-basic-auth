<?php

namespace Luinuxscl\WordpressBasicAuth\Models;

use Illuminate\Database\Eloquent\Model;

class WordpressCredential extends Model
{
    protected $fillable = ['site_url', 'username', 'password'];
    protected $hidden = ['password'];
}
