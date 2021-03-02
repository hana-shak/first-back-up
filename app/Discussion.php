<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Discussion extends Model
{
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function subdiscussion()
    {
        return $this->belongsTo(SubDiscussionCategory::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}
