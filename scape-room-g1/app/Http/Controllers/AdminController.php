<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// CRUD Models
use App\Models\Game;
use App\Models\Game1_puzzle;
use App\Models\Game2_kuku;
use App\Models\Game3_hangman;
use App\Models\Game4_pairs;
use App\Models\Game5_needPassword;
use App\Models\Player;

class AdminController extends Controller
{
    public function home()
    {
        return view('home');
    }

    // Returns a view with the game's questions and answers
    //-------------------------------------juego 1------------------------------------------------
    public function game1()
    {
        // paginate spreads the returned data into different pages
        // the number indicates the number of logs that will appear in a single page
        $game1_data = Game1_puzzle::paginate(10);

        // redirect to the game1_puzzle CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game1_puzzle', compact('game1_data'));
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
        return view('admin.game1edit', compact('game1'));
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
        $imgName = $request->molecule . ".png";
        $request->img_molecule->move(public_path('/img/game1_puzzles_img/'), $imgName);

        // adds the question and its answer to the game's question pool in the database
        $game1 = new Game1_puzzle();
        $game1->molecule = $request->molecule;
        $game1->img_molecule = $request->molecule . ".png";
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
        $imgName = $request->molecule . ".png";
        $old_imgName = $_REQUEST['old_imgName'];

        // if a new img was uploaded
        if ($request->hasFile('photo')) {
            // modifies the question in the database
            $game1 = Game1_puzzle::find($id);
            $game1->molecule = $request->molecule;
            $game1->img_molecule = $request->molecule . ".png";

            // deletes the old image and adds the new image to the game's image folder
            $request->img_molecule->move(public_path('/img/game1_puzzles_img/'), $imgName);
            unlink(public_path('/img/game1_puzzles_img/' . $old_imgName));

            $game1->save();
        } else {
            // modifies the question in the database
            $game1 = Game1_puzzle::find($id);
            $game1->molecule = $request->molecule;
            $game1->img_molecule = $request->molecule . ".png";
            // overwrites the img and then deletes the old one
            copy(public_path('/img/game1_puzzles_img/' . $old_imgName), public_path('/img/game1_puzzles_img/' . $imgName));
            unlink(public_path('/img/game1_puzzles_img/' . $old_imgName));
            $game1->save();
        }

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful modification
        return back()->withSuccess("La pregunta ha sido modificada.");
    }

    // Returns a view that asks if you want to delete a question and its answer
    public function game1destroy($id)
    {
        $game1 = Game1_puzzle::find($id);
        return view('admin.game1destroy', compact('game1'));
    }

    // Deletes the question and its answer
    public function game1destroyConfirm($id)
    {
        $game1 = Game1_puzzle::find($id);
        $img = $game1->img_molecule;

        // deletes the img from the game's img folder
        unlink(public_path('/img/game1_puzzles_img/' . $img));
        // deletes the log from the database
        $game1->delete();

        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game1');
    }
    //-------------------------------------juego 2------------------------------------------------

    // Returns a view with the game's questions and answers
    public function game2()
    {
        // paginate spreads the returned data into different pages
        // the number indicates the number of logs that will appear in a single page
        $game2_data = Game2_kuku::paginate(10);

        // redirect to the game2_kuku CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game2_kuku', compact('game2_data'));
    }

    // Returns a view for creating new questions and answers
    public function game2create()
    {
        return view('admin.game2create');
    }

    // Returns a view to edit a question and its answer
    public function game2edit(string $id)
    {
        $game2 = Game2_kuku::find($id);
        return view('admin.game2edit', compact('game2'));
    }

    // Saves the new question and its answer
    public function game2storeNew(Request $request)
    {
        // display what was sent by the form
        //return $request -> all();

        // validate compound and category
        $request->validate([
            'compound' => 'required',
            'category' => 'required'
        ]);

        // adds the question and its answer to the game's question pool in the database
        $game2 = new Game2_kuku();
        $game2->compound = $request->compound;
        $game2->category = $request->category;
        $game2->save();

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful creation
        return back()->withSuccess("La pregunta ha sido añadida.");
    }

    // Saves the edits of a question and its answer
    public function game2storeEdit(Request $request, $id)
    {
        // display what was sent by the form
        //return $request -> all();

        // validate compound and category
        $request->validate([
            'compound' => 'required',
            'category' => 'required'
        ]);

        // adds the question and its answer to the game's question pool in the database
        $game2 = Game2_kuku::find($id);
        $game2->compound = $request->compound;
        $game2->category = $request->category;
        $game2->save();

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful modification
        return back()->withSuccess("La pregunta ha sido modificada.");
    }

    // Returns a view that asks if you want to delete a question and its answer
    public function game2destroy($id)
    {
        $game2 = Game2_kuku::find($id);
        return view('admin.game2destroy', compact('game2'));
    }

    // Deletes the question and its answer
    public function game2destroyConfirm($id)
    {
        $game2 = Game2_kuku::find($id);

        // deletes the log from the database
        $game2->delete();

        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game2');
    }

    //-------------------------------------juego 3------------------------------------------------

    // Returns a view with the game's questions and answers
    public function game3()
    {
        // paginate spreads the returned data into different pages
        // the number indicates the number of logs that will appear in a single page
        $game3_data = Game3_hangman::paginate(10);

        // redirect to the game3_hangman CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game3_hangman', compact('game3_data'));
    }

   // Returns a view for creating new questions and answers
    public function game3create()
    {
        return view('admin.game3create');
    }

    // Returns a view to edit a question and its answer
    public function game3edit(string $id)
    {
        $game3 = Game3_hangman::find($id);
        return view('admin.game3edit', compact('game3'));
    }

    // Saves the new question and its answer
    public function game3storeNew(Request $request)
    {
        // display what was sent by the form
        //return $request -> all();

        // validate word
        $request->validate([
            'word' => 'required'
        ]);

        // adds the question and its answer to the game's question pool in the database
        $game3 = new Game3_hangman();
        $game3->word = $request->word;
        $game3->save();

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful creation
        return back()->withSuccess("La pregunta ha sido añadida.");
    }

    // Saves the edits of a question and its answer
    public function game3storeEdit(Request $request, $id)
    {
        // display what was sent by the form
        //return $request -> all();

        // validate word
        $request->validate([
            'word' => 'required'
        ]);

        // adds the question and its answer to the game's question pool in the database
        $game3 = Game3_hangman::find($id);
        $game3->word = $request->word;
        $game3->save();

        // redirects back to the game's CRUD when it finishes
        //return redirect('admin/game1');
        // returns back to the create view on successful modification
        return back()->withSuccess("La pregunta ha sido modificada.");
    }

    // Returns a view that asks if you want to delete a question and its answer
    public function game3destroy($id)
    {
        $game3 = Game3_hangman::find($id);
        return view('admin.game3destroy', compact('game3'));
    }

    // Deletes the question and its answer
    public function game3destroyConfirm($id)
    {
        $game3 = Game3_hangman::find($id);

        // deletes the log from the database
        $game3->delete();

        // redirects back to the game's CRUD when it finishes
        return redirect('admin/game3');
    }

    //-------------------------------------juego 4------------------------------------------------

    public function game4()
    {
        // paginate spreads the returned data into different pages
        // the number indicates the number of logs that will appear in a single page
        $game4_data = Game4_pairs::paginate(10);

        // redirect to the game4_pairs CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game4_pairs', compact('game4_data'));
    }
   // Returns a view for creating new questions and answers
       public function game4create()
        {
           return view('admin.game4create');
        }

       // Returns a view to edit a question and its answer
       public function game4edit(string $id)
       {
           $game4 = Game4_pairs::find($id);
           return view('admin.game4edit', compact('game4'));
       }

       // Saves the new question and its answer
       public function game4storeNew(Request $request)
       {
           // display what was sent by the form
           //return $request -> all();

           // validate growth and caracteristics
           $request->validate([
               'growth' => 'required',
               'caracteristics' => 'required'
           ]);

           // adds the question and its answer to the game's question pool in the database
           $game4 = new Game4_pairs();
           $game4->growth = $request->growth;
           $game4->caracteristics = $request->caracteristics;
           $game4->save();

           // redirects back to the game's CRUD when it finishes
           //return redirect('admin/game1');
           // returns back to the create view on successful creation
           return back()->withSuccess("La pregunta ha sido añadida.");
       }

       // Saves the edits of a question and its answer
       public function game4storeEdit(Request $request, $id)
        {
            // display what was sent by the form
            //return $request -> all();

            // validate growth and caracteristics
            $request->validate([
                'growth' => 'required',
                'caracteristics' => 'required'
            ]);

            // adds the question and its answer to the game's question pool in the database
            $game4 = Game4_pairs::find($id);
            $game4->growth = $request->growth;
            $game4->caracteristics = $request->caracteristics;
            $game4->save();

           // redirects back to the game's CRUD when it finishes
           //return redirect('admin/game1');
           // returns back to the create view on successful modification
           return back()->withSuccess("La pregunta ha sido modificada.");
       }

       // Returns a view that asks if you want to delete a question and its answer
       public function game4destroy($id)
       {
           $game4 = Game4_pairs::find($id);
           return view('admin.game4destroy', compact('game4'));
       }

       // Deletes the question and its answer
       public function game4destroyConfirm($id)
       {
           $game4 = Game4_pairs::find($id);

           // deletes the log from the database
           $game4->delete();

           // redirects back to the game's CRUD when it finishes
           return redirect('admin/game4');
       }
    //-------------------------------------juego 5------------------------------------------------

    // Returns a view with the game's questions and answers
    public function game5()
    {
        // paginate spreads the returned data into different pages
        // the number indicates the number of logs that will appear in a single page
        $game5_data = Game5_needPassword::paginate(10);

        // redirect to the game4_pairs CRUD view
        // compact passes the variables of this function to the view
        return view('admin.game5_needPassword', compact('game5_data'));
    }
    public function game5create()
    {
        return view('admin.game5create');
    }

    public function game5storeNew(Request $request)
    {
        //valido la informacion que me llega del formulario por los nombres de las cajas de texto
        $request->validate([
            'cientifico' => 'required',
            'clave' => 'required'
        ]);
        //una vez validado, creo la nueva insercicion
        $game5 = new Game5_needPassword();
        $game5->nombreCientifico = $request->cientifico;
        $game5->clave = $request->clave;
        $game5->save();

        //si se ha añadido correctamente...volvera y enseñará un mensaje
        // return back()->withSuccess("La pregunta ha sido añadida.");
        return redirect('/admin/game5')->with('success', 'La inserción se realizó correctamente');

    }

    public function game5edit($id){

        $game5 = Game5_needPassword::find($id);
        return view('admin.game5edit', compact('game5'));
    }

    public function game5editStore(Request $request,$id){
        //hago las validaciones de los campos que esten rellenados
        $request->validate([
            'cientifico' => 'required',
            'clave' => 'required'
        ]);
        //si esta correcto procedemos a la modificacion
        $game5= Game5_needPassword::find($id);
        $game5->nombreCientifico=$request->cientifico;
        $game5->clave=$request->clave;
        $game5->save();

        //si se ha modificó correctamente...volvera y enseñará un mensaje
        // return back()->withSuccess("La pregunta ha sido añadida.");
        return redirect('/admin/game5')->with('success', 'La modificación se realizó correctamente');
    }

    public function game5destroy($id){
        $game5=Game5_needPassword::find($id);
        return view('admin.game5destroy',compact('game5'));
    }

    public function game5destroyConfirm($id){
        $game5=Game5_needPassword::find($id);
        $game5->delete();

        //si hemos eliminado correctamente, nos redirige
        return redirect('/admin/game5')->with('success', 'La eliminacion del registro fue satisfactoria');
    }


    public function showPlayers(){
        $players=Player::all();
        return view("admin.players", compact("players"));
    }
}//esta es la llave final
