<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users extends Model
{
    protected $table = 'user';

    protected $fillable=[
        'id', 'email', 'password', 'name', 'username', 'birthdate', 'gender', 'linkPhoto'
    ];

    public function details(){
        return $this->hasMany(Thread::class, 'thread_id', 'id');
        return $this->hasMany(Reply::class, 'reply_id', 'id');
    }
}
