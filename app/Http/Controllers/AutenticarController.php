<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Models\Clientes;
class AutenticarController extends Controller
{
    public function IniciarSesion(Request $request){
        $correo = $request->post('correo');
        $password = $request->post('password');

        $usuario_admin = Admin::where('correo', '=', $correo)->where('password', '=', $password)->get();
        $usuario_cliente = Clientes:: where('correo', '=', $correo)->where('password', '=', $password)->get();

        foreach($usuario_admin as $admin){
            return view('template_admin');
            session(['id_admin' => $admin->id]);
            session(['admin' => $admin->nombre]);
        }

        foreach($usuario_cliente as $cliente){
            session(['cliente' => $cliente->nombre]);
            return redirect()->route('template_public');
        }

        return "Credenciales inválidas";

        // if(count($usuario_admin) > 0){

        // } else if(count($usuario_cliente) > 0) {

        // } else {
        //     echo "Credenciales inválidas";
        // }
    }

    public function CerrarSesion(){
        session()->forget(['id_admin', 'admin', 'cliente']);

        return redirect()->route('template_public');
    }
}
