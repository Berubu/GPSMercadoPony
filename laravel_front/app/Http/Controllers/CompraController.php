<?php
namespace App\Http\Controllers;

use App\Models\Compra;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use PDF;
use ZipArchive;
class CompraController extends Controller
{
    public function index()
    {
        $compras = Compra::with('usuario', 'producto')->get(); // Obtener todas las compras con sus relaciones
        return view('compras.index', compact('compras'));
    }

    public function show($id)
    {
        $compra = Compra::with('usuario', 'producto')->find($id);

        if (!$compra) {
            return redirect()->route('compras.index')->with('error', 'Compra no encontrada');
        }

        return view('compras.show', compact('compra'));
    }

    public function generateInvoice($id)
    {
        $compra = Compra::with('usuario', 'producto')->find($id);

        if (!$compra) {
            return redirect()->route('compras.index')->with('error', 'Compra no encontrada');
        }

        // Generar el PDF usando una vista específica para la factura
        $pdf = PDF::loadView('compras.invoice', compact('compra'));
        return $pdf->download('factura_compra_' . $compra->idCompra . '.pdf');
    }

    public function generateXML($id)
    {
        $compra = Compra::with('usuario', 'producto')->find($id);

        if (!$compra) {
            return redirect()->route('compras.index')->with('error', 'Compra no encontrada');
        }

        // Generar el contenido del XML
        $xmlContent = view('compras.xml', compact('compra'))->render();

        // Definir el nombre del archivo
        $xmlFileName = 'factura_compra_' . $compra->idCompra . '.xml';

        // Devolver el archivo como descarga
        return response()->make($xmlContent, 200, [
            'Content-Type' => 'application/xml',
            'Content-Disposition' => 'attachment; filename="' . $xmlFileName . '"',
        ]);
    }

}







