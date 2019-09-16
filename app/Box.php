<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Box extends Model
{
    public function game()
    {
        return $this->hasOne(Game::class, 'id', 'game_id');
    }
}
