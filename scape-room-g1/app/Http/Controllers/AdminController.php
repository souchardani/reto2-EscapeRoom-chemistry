<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Storage;

// CRUD Models
use App\Models\Game;
use App\Models\Game1_puzzle;
use App\Models\Game2_kuku;
use App\Models\Game3_hangman;
use App\Models\Game4_pairs;

class AdminController extends Controller
{

    // Returns a view with the game's questions and answers
    public function game1() {
        // paginate spreads the returned data into different pages
        // the number indicates the ammount of logs that will appear in a single page
        $game1_data = Game1_puzzle::paginate(10);

        // redirect to the game1_puzzle CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game1_puzzle',compact('game1_data'));
    }

    // Returns a view with the game's questions and answers
    public function game2() {
        // paginate spreads the returned data into different pages
        // the number indicates the ammount of logs that will appear in a single page
        $game2_data = Game2_kuku::paginate(10);

        // redirect to the game2_kuku CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game2_kuku',compact('game2_data'));
    }

    // Returns a view with the game's questions and answers
    public function game3() {
        // paginate spreads the returned data into different pages
        // the number indicates the ammount of logs that will appear in a single page
        $game3_data = Game3_hangman::paginate(10);

        // redirect to the game3_hangman CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game3_hangman',compact('game3_data'));
    }

    // Returns a view with the game's questions and answers
    public function game4() {
        // paginate spreads the returned data into different pages
        // the number indicates the ammount of logs that will appear in a single page
        $game4_data = Game4_pairs::paginate(10);

        // redirect to the game4_pairs CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game4_pairs',compact('game4_data'));
    }

    // Returns a view for creating new questions and answers
    public function game1create()
    {
        return view('admin.game1create');
    }

    // Returns a view to edit a question and its answer
    public function game1edit(string $id)
    {
        $game1 = Game1_puzzle::find($id);
        return view('admin.game1edit',compact('game1'));
    }

    // Saves the new question and its answer
    public function game1storeNew(Request $request)
    {
        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game1_puzzle');
    }

    // Saves the edits of a question and its answer
    public function game1storeEdit(Request $request, $id)
    {
        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game1_puzzle');
    }

    // Returns a view that asks if you want to delete a question and its answer
    public function game1destroy($id)
    {
        $game1 = Game1_puzzle::find($id);
        return view('admin.game1destroy',compact('game1'));
    }

    // Deletes the question and its answer
    public function game1destroyConfirm($id)
    {
        // deletes the img from the game's img folder

        // deletes the log from the database
        $game1 = Game1_puzzle::find($id);
        $game1->delete();

        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game1_puzzle');
    }
}
