<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClienteFormRequest;
use App\Http\Requests\ClienteUpdateFormRequest;
use App\Http\Resources\ClienteCollection;
use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            return new ClienteCollection(Cliente::filtrar($request));

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ClienteFormRequest $request)
    {
        try {

            Cliente::create($request->validated());

            return response()->json('Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit(Cliente $cliente)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(ClienteUpdateFormRequest $request, $id)
    {
        try {

            if (!Cliente::where('id', $id)->exists()) {
                return response()->json('Cadastro não encontrado.', 403);
            }

            $cliente = Cliente::find($id);
            $cliente->update($request->validated());

            return response()->json('Cadastro atualizado com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            if (!Cliente::where('id', $id)->exists()) {
                return response()->json('Cadastro não encontrado.', 403);
            }

            $cliente = Cliente::find($id);
            $cliente->delete();

            return response()->json('Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }
}
