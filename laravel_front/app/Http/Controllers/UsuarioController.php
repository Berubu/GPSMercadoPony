<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;



class UsuarioController extends Controller
{


        //EN LA WEB

        public function index()
        {
            $usuarios = Usuario::all(); // Obtener todos los productos
            return view('usuarios.index', compact('usuarios')); // Pasar los productos a la vista
        }

    /*
    public function index()
    {
        $usuarios = Usuario::all(); // Obtener todos los usuarios
        return response()->json($usuarios); // Retornar los usuarios en formato JSON
    }
*/

    public function store(Request $request)
    {
        $request->validate([
            'NombreUsuario' => 'required|string|unique:usuarios,NombreUsuario|max:100',
            'password' => 'required|string|min:8',
            'email' => 'required|string|email|unique:usuarios,email',
            'nombreCompleto' => 'required|string|max:255',
            'estrellas' => 'nullable|integer|min:0',
        ]);

        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    public function show($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        return response()->json($usuario);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'NombreUsuario' => 'sometimes|required|string|unique:usuarios,NombreUsuario,' . $id . '|max:100',
            'password' => 'sometimes|required|string|min:8',
            'email' => 'sometimes|required|string|email|unique:usuarios,email,' . $id,
            'nombreCompleto' => 'sometimes|required|string|max:255',
            'estrellas' => 'nullable|integer|min:0',
        ]);

        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->update($request->all());
        return response()->json($usuario, 200);
    }

    public function destroy($id)
    {
        $usuario = Usuario::find($id);

        if (!$usuario) {
            return response()->json(['message' => 'Usuario no encontrado'], 404);
        }

        $usuario->delete();
        return response()->json(null, 204);
    }



    public function showRegisterForm()
        {
            return view('auth.register'); // Asegúrate de que la vista esté correctamente apuntada
        }

        public function register(Request $request)
        {
            // Validación de datos
            $validator = Validator::make($request->all(), [
                'username' => ['required', 'string', 'max:255', 'unique:usuarios,NombreUsuario'],
                'fullName' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:usuarios,email'],
                'password' => ['required', 'string', 'min:8', 'confirmed'], // También necesita 'password_confirmation' en el formulario
                'termsAccepted' => ['accepted'],
            ]);

            if ($validator->fails()) {
                return back()->withErrors($validator)->withInput();
            }

            // Crear el nuevo usuario
            $usuario = Usuario::create([
                'NombreUsuario' => $request->username,
                'email' => $request->email,
                'password' => Hash::make($request->password), // Usamos Hash::make() para encriptar la contraseña
                'nombreCompleto' => $request->fullName,
                'fechaRegistro' => now(),
            ]);

            // Autenticación del usuario después del registro, si es necesario
            auth()->login($usuario);

            // Redirigir o mostrar un mensaje de éxito
            return redirect()->route('components.login'); // Cambia la ruta según corresponda
        }

    public function showLoginForm()
    {
        return view('components.login'); // Asegúrate de que la vista esté correctamente apuntada
    }

    public function login(Request $request)
    {
        // Validar los datos ingresados
        $request->validate([
            'username' => 'required|string',
            'password' => 'required|string', // Aún validamos el campo de la contraseña, pero no la usaremos
        ]);

        // Buscar al usuario por el nombre de usuario
        $usuario = Usuario::where('NombreUsuario', $request->input('username'))->first();

        // Si el usuario es encontrado, lo autenticamos manualmente (sin comprobar la contraseña)
        if ($usuario) {
            Auth::login($usuario); // Iniciar sesión directamente con el usuario encontrado
            $request->session()->regenerate(); // Regenerar la sesión para mayor seguridad
            return redirect()->route('landing'); // Redirigir al usuario a la página de inicio
        }

        // Si el usuario no es encontrado, regresamos con un error
        return back()->withErrors([
            'username' => 'Credenciales incorrectas.',
        ])->onlyInput('username');
    }





}
