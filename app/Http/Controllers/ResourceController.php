<?php

namespace App\Http\Controllers;
use App\Models\Cliente;

use Illuminate\Http\Request;

class ResourceController extends Controller
{
    public function welcome(){
        return view('welcome');
    }


    public function consultaPorFinalPlaca(Request $request)
{
    $finalPlaca = $request->input('ultimo_numero');
    
    try {
        $response = Http::get('api/consulta/final-placa/' . $finalPlaca);
        $data = $response->json();

        return view('consulta', ['clientes' => $data['clientes']]);
    } catch (\Illuminate\Http\Client\RequestException $e) {
        return response()->json(['error' => 'Ocorreu um erro ao consumir a API.'], 500);
    }
}

}
