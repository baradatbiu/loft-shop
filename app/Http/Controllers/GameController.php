<?php

namespace App\Http\Controllers;

use App\Box;
use App\Category;
use App\Game;
use Illuminate\Http\Request;

class GameController extends Controller
{
    public function show(int $id)
    {
        $game = Game::with('category')->where('id', $id)->first();
        return view('games.show', ['game' => $game]);
    }

    public function category(int $categoryId)
    {
        $games = Game::query()->where('category_id', $categoryId)->get();
        $category = Category::query()->where('id', $categoryId)->first();
        return view('main', ['games' => $games, 'title' => $category->title]);
    }

    public function buy(int $gameId)
    {
        $game = Game::query()->find($gameId);
        if (!$game) {
            return redirect()->route('home');
        }
        $box = new Box();
        $box->game_id = $gameId;
        $box->user_id = \Auth::id();
        $box->save();
        return redirect()->route('box');
    }
}
