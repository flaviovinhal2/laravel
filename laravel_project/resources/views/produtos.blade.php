<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <style>
        body.dark { background-color: #333; color: #fff; }
        body.dark input { background-color: #555; color: #fff; border: 1px solid #777; }
        img { max-width: 100px; display: block; margin: 5px 0; }
        .actions { display: flex; gap: 10px; }
    </style>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body class="{{ $tema == 'dark' ? 'dark' : '' }}">
    
    <header>
        <h1>Gestão de Produtos</h1>
        <a href="/tema"><button>Alternar Modo Escuro (Cookie)</button></a>
        <a href="/categorias"><button>Ir para Categorias</button></a>
    </header>

    <h2>Novo Produto</h2>

    @if(session('success'))
        <p style="color:green; border: 1px solid green; padding: 10px;">
            {{ session('success') }}
        </p>
    @endif

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/produtos" enctype="multipart/form-data">
        @csrf
        <label>Nome do Produto:</label>
        <input type="text" name="nome" value="{{ old('nome') }}" required>

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" value="{{ old('preco') }}" required>

        <label>Foto (PNG/JPG):</label>
        <input type="file" name="foto" accept="image/png, image/jpeg" required>

        <button type="submit">Salvar Produto</button>
    </form>

    <hr>

    <h2>Lista de Produtos</h2>
    <table border="1" width="100%">
        <thead>
            <tr>
                <th>Foto</th>
                <th>Nome</th>
                <th>Preço</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            @forelse($produtos as $produto)
                <tr>
                    <td>
                        @if($produto->foto)
                            <img src="{{ asset('storage/' . $produto->foto) }}" alt="Foto">
                        @else
                            Sem foto
                        @endif
                    </td>
                    <td>{{ $produto->nome }}</td>
                    <td>R$ {{ number_format($produto->preco, 2, ',', '.') }}</td>
                    <td class="actions">
                        <a href="/produtos/{{ $produto->id }}/edit">Editar</a>
                        
                        <form method="POST" action="/produtos/{{ $produto->id }}" onsubmit="return confirm('Tem certeza?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" style="background: red; color: white; border: none; cursor: pointer;">Excluir</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="4">Nenhum produto cadastrado.</td></tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
