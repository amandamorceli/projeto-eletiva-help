<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Chamado;
use App\Models\Categoria;
use App\Models\User;

class ChamadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = User::where('f_tipo_usuario', 'T')->get();

        $usuarios = User::all();

        $categorias = Categoria::all();

        $chamados = Chamado::get();
        
        $statusMap = [
            1 => 'Novo chamado',
            2 => 'Em Atendimento',
            3 => 'Em Validação',
            4 => 'Finalizado',
        ];
    
        $chamados = Chamado::all()->map(function ($chamado) use ($statusMap) {

            $codigoStatus = (int) $chamado->f_status; // converte para inteiro

            $chamado->f_status = $statusMap[$codigoStatus] ?? 'Desconhecido';

            return $chamado;
        });
        
        return view('menu.chamados.index', compact("chamados", "tecnicos", "usuarios", "categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tecnicos = User::where('f_tipo_usuario', 'T')->get();

        $usuarios = User::all();

        $categorias = Categoria::all();

        return view("menu.chamados.create", compact("tecnicos", "usuarios", "categorias"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {

            Chamado::create($request->all());
            
            return redirect()->route('chamados.index')->with('sucesso', 'Chamado criado com sucesso!');

        } 
        catch (Exception $e) {
            
            Log::error("Erro ao criar o chamado: " . $e->getMessage(), [
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
        $chamado = Chamado::findOrFail($id);

        $tecnicos = User::where('f_tipo_usuario', 'T')->get();

        $usuarios = User::all();

        $categorias = Categoria::all();

        return view("menu.chamados.show", compact('chamado', 'tecnicos', 'usuarios', 'categorias'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

        $chamado = Chamado::findOrFail($id);

        $tecnicos = User::where('f_tipo_usuario', 'T')->get();

        $usuarios = User::all();

        $categorias = Categoria::all();

        return view("menu.chamados.edit", compact('chamado', 'tecnicos', 'usuarios', 'categorias'));
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
            Log::error("Erro ao atualizar o chamado:" . $e->getMessage(), [
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
            Log::error("Erro ao excluir o chamado:" . $e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'chamado_id' => $id
            ]);
            return redirect()->route('chamados.index')->with('erro', 'Erro ao excluir o chamado!');
        }
    }

    public function filtrarPorStatus($status)
    {
        $chamados = Chamado::where('f_status', $status)->get();

        return view('menu.chamados.index', compact('chamados', 'status'));
    }

}
