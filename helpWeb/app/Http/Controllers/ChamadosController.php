<?php

namespace App\Http\Controllers;

use App\Models\Chamado;
use App\Models\Categoria;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ChamadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $chamados = Chamado::with(['tecnico', 'solicitante', 'categoriaDoChamado'])->get();
        return view('chamados.index', compact('chamados'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        return view("chamados.create", compact("categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            Chamado::create($request->all());
            return redirect()->route('chamados.index')->with('sucesso', 'Chamado criado com sucesso!');

        } catch (Exception $e) {
            Log::error("Erro ao criar o chamado: ".$e->getMessage(), [
            'stack' => $e->getTraceAsString(),
            'request' => $request->all() 
        ]);
        return redirect()->route('chamados.index')->with('erro', 'Erro ao criar o chamado!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $chamados = Chamado::findOrFail($id);
        $categorias = Categoria::all();
        return view("chamados.show", compact('chamados', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $chamado = Chamado::findOrFail($id);
        $categorias = Categoria::all();
        return view("chamados.edit", compact('chamado', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $chamado = Chamado::findOrFail($id);
            $chamado->update($request->all());
            return redirect()->route('chamados.index')->with('sucesso', 'Chamado alterado com sucesso!');
            
        } catch (Exception $e) {
            Log::error("Erro ao atualizar o chamado:".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'chamado_id' => $id,
                'request' => $request->all() 
            ]);
            return redirect()->route('chamados.index')->with('erro', 'Erro ao alterar o chamado!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $chamado = Chamado::findOrFail($id);
            $chamado->delete();
            return redirect()->route('chamados.index')->with('sucesso', 'Chamado excluído com sucesso!');
            
        } catch (Exception $e) {
            Log::error("Erro ao excluir o chamado:".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'chamado_id' => $id 
            ]);
            return redirect()->route('chamados.index')->with('erro', 'Erro ao excluir o chamado!');
        }
    }
}
