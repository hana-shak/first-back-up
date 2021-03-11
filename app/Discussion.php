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
        return $this->belongsTo(SubDiscussionCategory::class,'sub_discussion_categories_id');
    }




    public function replies()
    {
        return $this->hasMany(Reply::class ,'discussions_id');
    }

    public function comments()
    {
        return $this->hasMany(Comment::class ,'discussions_id');
    }

}
