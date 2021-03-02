<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDiscussionCategory extends Model
{
    protected $fillable = [
        'name', 'description', 'image','discussion_categories_id',
    ];

    public function discussioncategory()
    {
        return $this->belongsTo(DiscussionCategory::class, '');
    }

    public function discussions()
    {
        return $this->hasMany(Discussion::class);
    }

}
