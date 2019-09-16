<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function getImageUrl()
    {
        return '/img/cover/game-' . $this->id . '.jpg';
    }
}
