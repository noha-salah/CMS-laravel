<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\post;

class tag extends Model
{
    //
    protected $fillable=['name'];
    

    public function posts(){


return $this->belongsToMany(post::class);



    }
}
