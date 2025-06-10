<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Chamado;
use App\Models\Categoria;
use App\Models\HistoricoChamado;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ChamadosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tecnicos = User::where('tipo_usuario', 'T')->get();

        $usuarios = User::all();

        $categorias = Categoria::all();

        $user = Auth::user();

        if ($user->tipo_usuario === 'T') {
            $chamados = Chamado::all();

        } else {
            $chamados = Chamado::where('cod_solicitante', $user->id)->get();
        }
        
        return view('menu.chamados.index', compact("chamados", "tecnicos", "usuarios", "categorias"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tecnicos = User::where('tipo_usuario', 'T')->get();

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

            $chamado = $request->all();

            $chamado['status'] = 1;

            $chamado['cod_solicitante'] = Auth::user()->id;

            $chamado['cod_usuario_inc'] = Auth::user()->id;

            Chamado::create($chamado);

            HistoricoChamado::create([
                'cod_chamado' => $chamado['id'], // Relaciona o histórico ao chamado criado
                'status' => 1, // Status inicial do histórico
                'comentario' => 'Chamado criado', // Comentário inicial (pode ser alterado)
                'cod_usuario_inc' => Auth::user()->id, // Usuário que criou o histórico
                'd_inclusao' => now(), // Data de inclusão do histórico
            ]);
            
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

        $tecnicos = User::where('tipo_usuario', 'T')->get();

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

        $tecnicos = User::where('tipo_usuario', 'T')->get();

        $usuarios = User::all();

        $categorias = Categoria::all();

        $historicos = HistoricoChamado::where('cod_chamado', $chamado->id)->orderBy('d_inclusao', 'desc')->get();

        return view("menu.chamados.edit", compact('chamado', 'tecnicos', 'usuarios', 'categorias', 'historicos'));
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
        $chamados = Chamado::where('status', $status)->get();

        return view('menu.chamados.index', compact('chamados', 'status'));
    }

    public function filtrarPorUsuario()
    {
        $user = Auth::user();

        $chamados = Chamado::where('cod_solicitante', $user->id)->get();

        return view('menu.chamados.index', compact('chamados'));
    }   

}
