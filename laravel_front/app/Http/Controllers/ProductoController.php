<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

class ProductoController extends Controller
{



    public function index()
    {
        $productos = Producto::all();
        return response()->json($productos);
    }


/*
    //EN LA WEB

    public function index()
    {
        $productos = Producto::all(); // Obtener todos los productos
        return view('productos.index', compact('productos')); // Pasar los productos a la vista
    }
*/
    public function store(Request $request)
    {
        $request->validate([
                'nombreProducto' => 'required|string|max:100',
                'descripcion' => 'nullable|string',
                'precio' => 'required|numeric',
                'fechaPublicacion' => 'nullable|date',
                'idUsuario' => 'required|integer|exists:usuarios,idUsuario',
                'imagen' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Validar imagen
            ]);

        $producto = Producto::create($request->except('imagen'));

            // Subir la imagen si está presente
             if ($request->hasFile('imagen')) {
                    $imagen = $request->file('imagen');
                    $imagenNombre = $producto->idProducto . '.jpg'; // Usar el ID del producto como nombre
                    $imagen->storeAs(public_path('img'), $imagenNombre); // Guardar en la carpeta pública 'img'

                }

        return response()->json($producto, 201);
    }



    public function show($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        return $producto;
    }

public function showHtml($id)
{
    $producto = Producto::findOrFail($id);
    return view('components.vista-producto-react', compact('producto'));
}

public function show2($id)
{
    $producto = Producto::findOrFail($id); // Obtiene el producto por ID o lanza un error si no lo encuentra
    return view('components.vista-compra', compact('producto'));
}


    public function update(Request $request, $id)
    {
        $request->validate([
            'nombreProducto' => 'sometimes|required|string|max:100',
            'descripcion' => 'nullable|string',
            'precio' => 'sometimes|required|numeric',
            'fechaPublicacion' => 'nullable|date',
            'idUsuario' => 'sometimes|required|integer|exists:usuarios,idUsuario',
        ]);

        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->update($request->all());
        return response()->json($producto, 200);
    }

    public function destroy($id)
    {
        $producto = Producto::find($id);

        if (!$producto) {
            return response()->json(['message' => 'Producto no encontrado'], 404);
        }

        $producto->delete();
        return response()->json(null, 204);
    }

   public function landing()
       {
           // Obtener los primeros 10 productos de la base de datos
           $productos = Producto::paginate(8);

           // Pasar los productos a la vista
           return view('components.landing', compact('productos'));
       }

   public function listaprod()
          {
              // Obtener los productos del usuario logueado
              $productos = Producto::where('idUsuario', auth()->user()->idUsuario)->get();

              // Retornar la vista con los productos filtrados
              return view('components.listaprod', compact('productos'));
          }



       public function buscar(Request $request)
       {
           $query = $request->input('q');

           // Buscar productos por nombre o descripción sin paginación
           $productos = Producto::where('nombreProducto', 'LIKE', "%$query%")
                                ->orWhere('descripcion', 'LIKE', "%$query%")
                                ->get(); // Obtén todos los productos que coinciden

           // Retornar los resultados a la vista
           return view('productos.resultados', compact('productos', 'query'));
       }
       public function search(Request $request)
{
    $query = $request->input('q'); // Obtiene el término de búsqueda desde la URL (?q=...)
    
    // Realiza la búsqueda en los campos 'nombreProducto' y 'descripcion'
    $productos = Producto::where('nombreProducto', 'LIKE', "%{$query}%")
        ->orWhere('descripcion', 'LIKE', "%{$query}%")
        ->paginate(8); // Pagina los resultados
    
    return response()->json($productos);
}


      





}


