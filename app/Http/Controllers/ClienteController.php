<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cliente;

class ClienteController extends Controller
{
    public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'telefone' => 'required',
        'cpf' => 'required|unique:clientes',
        'placa' => 'required|unique:clientes',
        'marca' => 'required',
        'cor' => 'required',
    ]);

    $cliente = new Cliente();
    $cliente->nome = $request->input('nome');
    $cliente->telefone = $request->input('telefone');
    $cliente->cpf = $request->input('cpf');
    $cliente->placa = $request->input('placa');
    $cliente->marca = $request->input('marca');
    $cliente->cor = $request->input('cor');
    $cliente->save();

    return response()->json(['message' => 'Cliente cadastrado com sucesso'], 201);
}
public function update(Request $request, $id)
{
    $request->validate([
        'nome' => 'required',
        'telefone' => 'required',
        'cpf' => 'required|unique:clientes,cpf,'.$id,
        'placa' => 'required|unique:clientes,placa,'.$id,
        'marca' => 'required',
        'cor' => 'required',
    ]);

    $cliente = Cliente::findOrFail($id);
    $cliente->nome = $request->input('nome');
    $cliente->telefone = $request->input('telefone');
    $cliente->cpf = $request->input('cpf');
    $cliente->placa = $request->input('placa');
    $cliente->marca = $request->input('marca');
    $cliente->cor = $request->input('cor');
    $cliente->save();

    return response()->json(['message' => 'Cliente atualizado com sucesso'], 200);
}

public function destroy($id)
{
    $cliente = Cliente::findOrFail($id);
    $cliente->delete();

    return response()->json(['message' => 'Cliente excluído com sucesso'], 200);
}

public function index()
{
    $clientes = Cliente::all();
    return response()->json($clientes, 200);
}

public function show($id)
{
    $cliente = Cliente::findOrFail($id);

    return response()->json(['cliente' => $cliente], 200);
}

public function consultaPorFinalPlaca($finalPlaca)
{
    $clientes = Cliente::whereRaw("RIGHT(placa, 1) = ?", [$finalPlaca])->get();

    return response()->json(['clientes' => $clientes], 200);
}

}
