<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\Usuario;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'usuario' => 'required',
            'senha' => 'required'
        ]);

        $usuario = Usuario::where('usuario', $request->usuario)->first();

        if ($usuario && Hash::check($request->senha, $usuario->senha)) {
            Auth::login($usuario);
            return redirect('/dashboard');
        }

        return back()->withErrors(['login' => 'Usuário ou senha inválidos.']);
    }

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validação comum, exceto o CPF (não pode usar unique direto porque está criptografado)
        $request->validate([
            'usuario' => 'required|unique:usuarios,usuario',
            'nome' => 'required|string|max:100',
            'email' => 'required|email|unique:usuarios,email',
            'cpf' => 'required|string',
            'senha' => 'required|min:6|confirmed',
        ]);

        // Verificar manualmente se o CPF já existe
        $cpfExiste = Usuario::all()->contains(function ($usuario) use ($request) {
            return $usuario->cpf === $request->cpf;
        });

        if ($cpfExiste) {
            return back()->withErrors(['cpf' => 'Este CPF já está em uso.'])->withInput();
        }

        $usuario = Usuario::create([
            'usuario' => $request->usuario,
            'nome' => $request->nome,
            'email' => $request->email,
            'cpf' => $request->cpf,
            'senha' => Hash::make($request->senha),
            'status' => true,
            'tipo' => 'cliente',
        ]);

        Auth::login($usuario);
        return redirect('/dashboard');
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
