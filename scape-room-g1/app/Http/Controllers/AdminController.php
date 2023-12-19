<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// CRUD Models
use App\Models\Game;
use App\Models\Game1_puzzle;
use App\Models\Game2_kuku;
use App\Models\Game3_hangman;
use App\Models\Game4_pairs;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

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

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
