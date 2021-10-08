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

    public function verification(Request $request)
    {
        $data = request()->except('_token');




        return view ('auth.verificacionsiiau')->with(['data' => $data]);
    }
    public function selectRole(Request $request, User $data)
    {
        include 'simple_html_dom.php';
        
        $datos_siiau = request()->except('_token');
        $campos = [
            'p_codigo_c' => $datos_siiau['code'],
            'p_clave_c' => $datos_siiau['nip']          
        ];

       $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "http://siiauescolar.siiau.udg.mx/wus/gupprincipal.valida_inicio");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($campos));
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
        
        //$response = curl_exec($ch);
        //return $response;
        //curl_close($ch);
        

              
        $id_hidden = [
            'p_pidm_n' => '1145982'
        ];
        curl_setopt($ch, CURLOPT_URL, "http://siiauescolar.siiau.udg.mx/wus/gupprincipal.FrameMenu");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($id_hidden));
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
       
        
        
       $response = curl_exec($ch);
       echo $response;
       curl_close($ch);
        /*
        curl_setopt($ch, CURLOPT_URL, "http://siiauescolar.siiau.udg.mx/wus/gupmenug.menu_sistema?p_pidm_n=1145982");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
        
        
        $response = curl_exec($ch);
       // echo $response;
        //curl_close($ch);
        
        
        curl_setopt($ch, CURLOPT_URL, value:"http://siiauescolar.siiau.udg.mx/wal/gupmenug.menu?p_sistema_c=ALUMNOS&p_sistemaid_n=3&p_menupredid_n=3&p_pidm_n=".$id_hidden['p_pidm_n']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, value:1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, value:1); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
      
        
        $response = curl_exec($ch);
        //echo $response;
        //curl_close($ch);
        
        
        curl_setopt($ch, CURLOPT_URL, value:"http://siiauescolar.siiau.udg.mx/wal/gupmenug.menu?p_sistema_c=ALUMNOS&p_sistemaid_n=3&p_menupredid_n=236&p_pidm_n=".$id_hidden['p_pidm_n']);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, value:1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, value:1); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
        
        
        $response = curl_exec($ch);
        //echo $response;
        //curl_close($ch);
        
        
        curl_setopt($ch, CURLOPT_URL, value: "http://siiauescolar.siiau.udg.mx/wal/sgphist.promedio?pidmp=1145982&majrp=INCO");
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, value:1);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, value:1); 
        curl_setopt($ch, CURLOPT_COOKIEFILE, "cookie.txt");
        curl_setopt($ch, CURLOPT_COOKIEJAR, "cookie.txt");
      
        
        $response = curl_exec($ch);
        if (curl_errno($ch)) { 
            print curl_error($ch); 
         } 
        echo $response;
        curl_close($ch);
        
       
        


       

        
        /*$roles = Role::all();
        $carreras = Carrera::all();
        $coordinadores = Coordinador::all();
        $data = request()->except('_token');
       $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            
            'password' => Hash::make($data['password']),
        ]);
        return view('auth.usertype')->with(['user' => $user, 'roles' => $roles, 
        'carreras' => $carreras, 'coordinadores' => $coordinadores]);*/
        
        
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
