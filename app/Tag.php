<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected  $table ='tags';
    protected $fillable = [
        'name'
    ];

    public function articles()
    {
        return $this->belongsToMany(Article::class);
    }

    public function blogs()
    {
        return $this->belongsToMany(Blog::class);
    }

}
