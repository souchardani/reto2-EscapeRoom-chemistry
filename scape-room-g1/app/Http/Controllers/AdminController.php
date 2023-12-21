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
        // display what was sent by the form
        //return $request -> all();

        // validate name and img sent
        $request->validate([
            'molecule' => 'required',
            'img_molecule' => 'required|mimes:jpg, jpeg, png|max:10000'
        ]);

        // adds the image to the game's image folder
        $imgName = $request->molecule.".png";
        $request->img_molecule->move(public_path('/img/game1_puzzles_img/'), $imgName);

        // adds the question and its answer to the game's question pool in the database
        $game1 = new Game1_puzzle();
        $game1->molecule = $request->molecule;
        $game1->img_molecule = $request->molecule.".png";
        $game1->save();

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful creation
        return back()->withSuccess("La pregunta ha sido añadida.");
    }

    // Saves the edits of a question and its answer
    public function game1storeEdit(Request $request, $id)
    {
        // display what was sent by the form
        //return $request -> all();

        // validate name and img sent
        $request->validate([
            'molecule' => 'required',
            'img_molecule' => 'nullable|mimes:jpg, jpeg, png|max:10000'
        ]);

        // assigns the img the same name as the molecule and adds the png extension
        $imgName = $request->molecule.".png";
        $old_imgName = $_REQUEST['old_imgName'];
// NO VA EL IF
        if(isset($_REQUEST['img_molecule'])) {
            echo ("ha entrado al if");
            // modifies the question in the database
            $game1 = Game1_puzzle::find($id);
            $game1->molecule = $request->molecule;
            $game1->img_molecule = $request->molecule.".png";

            // deletes the old image and adds the new image to the game's image folder
            $request->img_molecule->move(public_path('/img/game1_puzzles_img/'), $imgName);
            unlink(public_path('/img/game1_puzzles_img/'.$old_imgName));

            $game1->save();
        }

        else {
            // modifies the question in the database
            $game1 = Game1_puzzle::find($id);
            $game1->molecule = $request->molecule;
            $game1->img_molecule = $request->molecule.".png";
            // overwrites the img and then deletes the old one
            copy(public_path('/img/game1_puzzles_img/'.$old_imgName),public_path('/img/game1_puzzles_img/'.$imgName));
            unlink(public_path('/img/game1_puzzles_img/'.$old_imgName));
            $game1->save();
        }

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful creation
        return back()->withSuccess("La pregunta ha sido modificada.");
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
        $game1 = Game1_puzzle::find($id);
        $img = $game1->img_molecule;

        // deletes the img from the game's img folder
        unlink(public_path('/img/game1_puzzles_img/'.$img));
        // deletes the log from the database
        $game1->delete();

        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game1');
    }
}
