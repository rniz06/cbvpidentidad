<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\Personal\Categoria;
use App\Models\Vistas\VtUsuario;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        $categorias = Categoria::select('idpersonal_categorias', 'categoria')->get();
        return view('auth.login', compact('categorias'));
    }

    public function login(LoginRequest $request)
    {
        $tipoEntrada = filter_var($request->codigo, FILTER_VALIDATE_EMAIL) ? 'email' : 'codigo';

        switch ($tipoEntrada) {
            case 'email':
                // Autenticación por email
                if (Auth::attempt(['email' => $request->codigo, 'password' => $request->password])) {
                    return redirect()->route('inicio');
                }
                break;

            case 'codigo':
                // Autenticación por código
                $usuario = VtUsuario::where('categoria_id', $request->categoria_id)
                    ->where('codigo', $request->codigo)
                    ->first();

                if ($usuario && Hash::check($request->password, $usuario->password)) {
                    Auth::login($usuario);
                    return redirect()->route('inicio');
                }
                break;
        }

        // Si llegamos aquí, la autenticación falló
        return back()->withErrors(['error' => 'Credenciales inválidas']);
    }

    /**
     * Cerrar la sesión del usuario de la aplicación.
     */
    public function logout(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
