<?php

namespace App\Http\Controllers;

use App\Http\Requests\EmpresaFormRequest;
use App\Http\Resources\EmpresaCollection;
use App\Models\Empresa;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {

            return new EmpresaCollection(Empresa::filtrar($request));

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
    public function store(EmpresaFormRequest $request)
    {
        try {

            Empresa::create($request->validated());

            return response()->json('Cadastro realizado com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(EmpresaFormRequest $request, $id)
    {
        try {

            if (!Empresa::where('id', $id)->exists()) {
                return response()->json('Cadastro não encontrado.', 403);
            }

            $empresa = Empresa::find($id);
            $empresa->update($request->validated());

            return response()->json('Cadastro atualizado com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {

            if (!Empresa::where('id', $id)->exists()) {
                return response()->json('Cadastro não encontrado.', 403);
            }

            $empresa = Empresa::find($id);
            $empresa->delete();

            return response()->json('Cadastro excluído com sucesso!');

        } catch (\Exception $ex) {
            return response()->json($ex->getMessage(), 500);
        }
    }
}
