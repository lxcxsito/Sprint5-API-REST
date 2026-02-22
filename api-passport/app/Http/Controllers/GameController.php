<?php

namespace App\Http\Controllers;

use App\Models\Game;

class GameController extends Controller
{

    public function index()
    {
        $games = Game::with('category')->get();

        return response()->json($games);
    }

    public function show($id)
    {
        $game = Game::with(['category', 'reviews'])
                    ->find($id);

        if (!$game) {
            return response()->json([
                'message' => 'Juego no encontrado'
            ], 404);
        }

        return response()->json($game);
    }
}