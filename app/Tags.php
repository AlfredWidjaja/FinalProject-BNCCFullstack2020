<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tags extends Model
{
    protected $table = 'tag';

    protected $fillable=[
        'id', 'nametag', 'description'
    ];

    public function details(){
        return $this->hasMany(Thread::class, 'thread_id', 'id');
    }
}
