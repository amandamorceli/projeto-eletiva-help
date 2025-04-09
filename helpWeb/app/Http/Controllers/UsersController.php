<?php

namespace App\Http\Controllers;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarios = User::get();
        return view('menu.usuarios.index', compact('usuarios'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("menu.usuarios.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            User::create($request->all());
            return redirect()->route('menu.usuarios.index')->with('sucesso', 'Usuário criado com sucesso!');

        } catch (Exception $e) {
            Log::error("Erro ao criar o usuário: ".$e->getMessage(), [
            'stack' => $e->getTraceAsString(),
            'request' => $request->all() 
        ]);
        return redirect()->route('menu.usuarios.index')->with('erro', 'Erro ao criar o usuário!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = User::findOrFail($id);
        return view("menu.usuarios.show", compact('usuario'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuario = User::findOrFail($id);
        return view("menu.usuarios.edit", compact('usuario'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->update($request->all());
            return redirect()->route('menu.usuarios.index')->with('sucesso', 'Usuário alterado com sucesso!');
            
        } catch (Exception $e) {
            Log::error("Erro ao atualizar o usuário:".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'usuario_id' => $id,
                'request' => $request->all() 
            ]);
            return redirect()->route('menu.usuarios.index')->with('erro', 'Erro ao alterar o usuário!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $usuario = User::findOrFail($id);
            $usuario->delete();
            return redirect()->route('menu.usuarios.index')->with('sucesso', 'Usuário excluído com sucesso!');
            
        } catch (Exception $e) {
            Log::error("Erro ao excluir o usuário:".$e->getMessage(), [
                'stack' => $e->getTraceAsString(),
                'usuario_id' => $id 
            ]);
            return redirect()->route('menu.usuarios.index')->with('erro', 'Erro ao excluir o usuário!');
        }
    }
}
