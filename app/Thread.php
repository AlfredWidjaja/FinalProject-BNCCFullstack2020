<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    protected $table = 'thread';

    protected $fillable=[
        'id', 'title', 'description'
    ];

    public function task(){
        return $this->belongsTo(Users::class, 'user_id', 'id');
        return $this->belongsToMany(Tags::class, 'tag_id', 'id');
    }

    public function details(){
        return $this->hasMany(Reply::class, 'reply_id', 'id');
    }
}
