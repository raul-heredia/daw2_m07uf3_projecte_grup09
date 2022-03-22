<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
class ControladorLogin extends Controller
{
 /**
 * Handle an authentication attempt.
 *
 * @param \Illuminate\Http\Request $peticio
 * @return \Illuminate\Http\Response
 */
 public function autentica(Request $peticio){
 $credencials = $peticio->validate([
    'email' => ['required', 'email'],
    'password' => ['required'],
 ]);

 if (Auth::attempt($credencials)) {
    $usuari = User::findOrFail($peticio->email);
    $email = $usuari["email"];
    session_start();
    if($usuari["isCapDepartament"]){
        $_SESSION['administrador'] = $email;
    } else{
        $_SESSION['usuari'] = $email;
    }
    User::where('email', $email)->update(array('horaEntrada' => now()));   
    return redirect()->route('inici.index');
 }
 return back()->withErrors([
    'email' => 'Les credencials no corresponen a un usuari existent.',
    ]);
 }
 public function tancar(){
    session_start();
    if(isset($_SESSION["usuari"])){
        User::where('email', $_SESSION["usuari"])->update(array('horaSortida' => now()));   
    }else if(isset($_SESSION["administrador"])){
        User::where('email', $_SESSION["administrador"])->update(array('horaSortida' => now()));   
    }
    session_unset();
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(session_name(), '', time() - 42000,
            $params["path"], $params["domain"],
            $params["secure"], $params["httponly"]
        );
    }
    session_destroy();
    return redirect('/');
 }
}
