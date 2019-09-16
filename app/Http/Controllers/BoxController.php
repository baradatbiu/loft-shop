<?php

namespace App\Http\Controllers;

use App\Box;
use App\Order;
use App\OrderGame;
use Illuminate\Http\Request;

class BoxController extends Controller
{
    public function main()
    {
        $box = Box::with('game.category')->where('user_id', \Auth::id())->get();
        return view('box.main', ['box' => $box]);
    }

    public function order()
    {
        $userId = \Auth::id();
        $box = Box::with('game')->where('user_id', $userId)->get();
        if (!$box) {
            return redirect()->route('home');
        }
        $order = new Order();
        $order->user_id = $userId;
        $order->save();
        if (!$order->id) {
            return redirect()->route('home');
        }
        $data = [];
        foreach ($box as $box) {
            $data[] = [
                'order_id' => $order->id,
                'user_id' => $box->game->id,
                'price' => $box->game->price
            ];
        }
        OrderGame::insert($data);
        Box::query()->where('user_id', $userId)->delete();
        return redirect()->route('home');
    }
}
