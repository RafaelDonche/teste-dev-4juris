<?php

namespace App\Http\Controllers;

use App\Http\Requests\UsuarioFormRequest;
use App\Http\Requests\UsuarioUpdateFormRequest;
use App\Http\Resources\UsuarioCollection;
use App\Models\Usuario;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            return new UsuarioCollection(Usuario::filtrar($request));

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
    public function store(UsuarioFormRequest $request)
    {
        try {

            Usuario::create($request->validated());

            return response()->json('Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioUpdateFormRequest $request, $id)
    {
        try {

            if (!Usuario::where('id', $id)->exists()) {
                return response()->json('Cadastro não encontrado.', 403);
            }

            $usuario = Usuario::find($id);
            $usuario->update($request->validated());

            return response()->json('Cadastro atualizado com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            if (!Usuario::where('id', $id)->exists()) {
                return response()->json('Cadastro não encontrado.', 403);
            }

            $usuario = Usuario::find($id);
            $usuario->delete();

            return response()->json('Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }
}
