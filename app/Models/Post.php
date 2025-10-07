<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Post extends Model
{
    use HasFactory;

    //one to one
    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }

    public function image(){
        if($this->image){
            return asset('storage/images/'.basename($this->image));
        }
        else{
            return asset('storage/images/default.jpg');
        }
    }

    public function tags(){
        return $this->belongsToMany(Tag::class);
    }

}
