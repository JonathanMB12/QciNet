<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Carrera;
use App\Models\Coordinador;
use App\Models\Estudiante;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

   

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
           
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    public function index()
    {
        
    }
    public function selectRole(Request $request)
    {
        $roles = Role::all();
        $carreras = Carrera::all();
        $coordinadores = Coordinador::all();
        $data = request()->except('_token');
       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            
            'password' => Hash::make($data['password']),
        ]);
        return view('auth.usertype')->with(['user' => $user, 'roles' => $roles, 
        'carreras' => $carreras, 'coordinadores' => $coordinadores]);
           
    }

    protected function create(array $data)
    {
        $roles = Role::all();
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
    }

    public function storeRole(Request $request, User $user)
    {
        //$user = User::findOrFail($id);
        $this->guard()->login($user); 
        $user->roles()->sync($request->roles);
        
        if($request->roles == 2)
        {
            Coordinador::insert([
                'user_id' => $user['id'],
                'carrera_id' =>  $request['carrera_nombre'],
            ]);
        }
        if($request->roles == 3)
        {
            Estudiante::insert([
                'user_id' => $user['id'],
                'carrera_id' =>  $request['carrera_nombre'],
            ]);
        }
        
        return redirect('home')->with('mensaje', 'Bienvenido');
        //return $request['carrera'];
    }

    public function redirectPath()
    {
         return '/principal';
    }
}
