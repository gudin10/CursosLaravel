<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Exceptions\Handler as ExceptionHandler;

use App\Models\User;

class ConnectController extends Controller
{
    

    public function __Construct(){
        //$this->middleware('guest');//cualquier funcion o metodo requiere usuario sea visitante
        
    }
    //---------
    public function getLogin(){
        return view('connect.login');//->except(['logout']);

    }

    public function postLogin(Request $request){
        $rules=[
            'email'=>'required|email',
            'password'=>'required|min:4',
            'password.required'=>'Por favor escriba la contraseña',
            'password.min'=>'Contraseña min 4 caracteres'
        ];

        $messages=[
            'email.requiered'=>'Se requiere el correo',
            'email.email'=>'Formato de correo no es valido',
            'email.unique'=>'Ya existe el correo',
        ];

        $this->validate($request,$rules,$messages);

        if (Auth::attempt(['email'=>$request->input('email'),'password'=>$request->input('password')],true)) {
            return redirect('/');
        }else {
            $this->validate($request,$rules,$messages);
            return redirect()->route('login');
        }
    }

    public function getRegister(){
        return view('connect.register');
    }

    public function postRegister(Request $request){
        $rules=[
            'name'=>'required',//que sea requerido
            'lastname'=>'required',
            'email'=>'required|email|unique:users,email',//validacion que sea unica
            'password'=>'required|min:4',//tenga minimo 8 caracteres
            'cpassword'=>'required|min:4|same:password'//la misma
        ];

        $messages=[
            'name.required'=>'Se requiere el nombre',
            'lastname.required'=>'Se requiere el apellido',
            'email.requiered'=>'Se requiere el correo',
            'email.email'=>'Formato de correo no es valido',
            'email.unique'=>'Ya existe el correo',
            'password.required'=>'Por favor escriba contraseña',
            'password.min'=>'Contraseña mínimo 4 caracteres',
            'cpassword'=>'Por favor confirmar la contraseña',
            'cpassword.min'=>'Debe tener 4 caracteres',
            'cpassword.same'=>'Las contraseñas no coinciden'
        ];

        //$validator= Validator::make($request->all(),$rules,$messages);
        $this->validate($request,$rules,$messages);


        $user = new User;
        $user->name= e($request->input('name'));
        $user->lastname= e($request->input('lastname'));
        $user->email= e($request->input('email'));
        $user->password= Hash::make($request->input('password'));
        $user->save();
        return redirect()->route('login');
            
        //return redirec('/login')->with('message','Se creo exitosamente.')->with('typealert','succes');

        /*
        if($validator->fails()):
            return back()->withErrors($validator)->with('message','Se produjo un error.')->with('typealert','danger');
        else:
            $user = new User;
            $user->name= e($request->input('name'));
            $user->lastname= e($request->input('lastname'));
            $user->email= e($request->input('email'));
            $user->password= Hash::make($request->input('password'));
            if($user->save()):
                return redirec('/login')->with('message','Se creo exitosamente.')->with('typealert','succes');
            endif;
        endif;*/
    }

    public function getLogout(){
        Auth::logout();
        return redirect('/');
    }

    
}
