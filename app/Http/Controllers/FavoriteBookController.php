<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FavoriteBook;

class FavoriteBookController extends Controller
{
    //

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required|exists:users,id',
            'book_title' => 'required|string',
            'author' => 'required|string',
        ]);
        
        
        $existingFavoriteBook = FavoriteBook::where([
            'user_id' => $request->user_id,
            'book_title' => $request->book_title,
            'author' => $request->author,
        ])->first();

        if ($existingFavoriteBook) {
            $existingFavoriteBook->delete();
        }else{
            $favoriteBook = FavoriteBook::create([
                'user_id' => $request->user_id,
                'book_title' => $request->book_title,
                'author' => $request->author,
            ]);
        }

        return response()->json(['message' => $request->user_id, 'data' => "favoriteBook"], 201);
    }

    public function index($userId)
    {
        $favoriteBooks = FavoriteBook::where('user_id', $userId)->get();

        return response()->json(['data' => $favoriteBooks], 200);
    }


}
