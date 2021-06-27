<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reply extends Model
{
    protected $table = 'reply';

    protected $fillable=[
        'id', 'title', 'description', 'user_id', 'thread_id', 'reply_id'
    ];

    public function task(){
        return $this->belongsTo(Users::class, 'user_id', 'id');
        return $this->belongsToMany(Thread::class, 'thread_id', 'id');
        return $this->belongsTo(Reply::class, 'reply_id', 'id');
    }

    public function details(){
        return $this->hasMany(Reply::class, 'reply_id', 'id');
    }
}
