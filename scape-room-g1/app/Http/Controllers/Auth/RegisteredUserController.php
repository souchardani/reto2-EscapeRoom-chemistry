<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(Request $request)
    {
        if (auth()->check()) {
            return view('auth.register');
        } else {
            return redirect()->route("login")->with("error", "No puedes registrar un nuevo usuario si no estás logueado como administrador");
        }
    }
    public function show()
    {
        if (auth()->check()) {
            $users = User::where('id', '!=', 1)->get();
            return view('admin.administradores', compact('users'));
        } else {
            return redirect()->route("login")->with("error", "No puedes registrar un nuevo usuario si no estás logueado como administrador");
        }
    }

    public function editAdmin($id){
        $admin=User::find($id);
        return view("admin.editAdmin", compact("admin"));
    }

    public function destroyAdmin($id){
        $admin=User::find($id);
        return view("admin.destroyAdmin", compact("admin"));
    }

    public function destroyAdminConfirm($id){
        $admin=User::find($id);
        $admin->delete();
        return redirect('/admin/admins/')->with('success', 'El Administrador se eliminó correctamente');
    }

    public function storeadmin($id, Request $request){
        $admin=User::find($id);
        $admin->name=$request->name;
        $admin->email=$request->email;
        $admin->save();
        return redirect('/admin/admins/')->with('success', 'El admininstrador se editó correctamente');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);



        event(new Registered($user));

        //no hacemos login automático con el usuario recién creado
        // Auth::login($user);

        return redirect(RouteServiceProvider::HOME);
    }
}
