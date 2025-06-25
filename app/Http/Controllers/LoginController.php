<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Usuario;
use Illuminate\Validation\ValidationData;

use Validator;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            "nombre"=> "required|string|max:255",
            "email"=> "required|email|unique:usuarios,email",
            "password"=> "required|min:6",
            ]);
            if ($validator->fails()) {
                return redirect()->back()
                                    ->withErrors($validator)
                                    ->withInput();
            }
            $usuario = new Usuario();
            $usuario->nombre = $request->nombre;
            $usuario->email = $request->email;
            $usuario->password = Hash::make($request->password);
            $usuario->save();

            return redirect('login')
                            ->with('type','success')
                            ->with('message','Usuario registrado exitosamente');
    }

    public function check(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)){
            return redirect()
        }



}
