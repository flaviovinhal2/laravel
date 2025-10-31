<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produto;

class ProdutoController extends Controller
{
    public function index()
    {
        $produtos = Produto::all();
        return view('produtos', compact('produtos'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nome' => 'required|min:3|max:100',
            'preco' => 'required|numeric|min:0',
        ]);

        Produto::create($validated);

        return redirect()->back()->with('success', 'Produto cadastrado com sucesso!');
    }
}
