<?php


namespace App\Http\Controllers;


use App\Models\User;
use Firebase\JWT\JWT;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class TokenController extends Controller
{
    public function gerarToken(Request $request)
    {

        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = User::where('email', $request->email)->first();

        if (is_null($usuario)
            || !Hash::check($request->password, $usuario->password)) {
            return response()->json(['error' => 'usuário ou senha inválidos'], 401);
        }
        $token = JWT::encode(
            ['email' => $usuario->email],
            env('JWT_KEY'));

        return response()->json(['token' => $token], 200);
    }

}
