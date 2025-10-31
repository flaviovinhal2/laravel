<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Produtos</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <h1>Cadastro de Produtos</h1>

    @if(session('success'))
        <p style="color:green">{{ session('success') }}</p>
    @endif

    @if($errors->any())
        <ul style="color:red">
            @foreach($errors->all() as $erro)
                <li>{{ $erro }}</li>
            @endforeach
        </ul>
    @endif

    <form method="POST" action="/produtos">
        @csrf
        <label>Nome do Produto:</label>
        <input type="text" name="nome" value="{{ old('nome') }}">

        <label>Preço:</label>
        <input type="number" name="preco" step="0.01" value="{{ old('preco') }}">

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de Produtos</h2>
    <ul>
        @forelse($produtos as $produto)
            <li>{{ $produto->nome }} - R$ {{ number_format($produto->preco, 2, ',', '.') }}</li>
        @empty
            <li>Nenhum produto cadastrado.</li>
        @endforelse
    </ul>
</body>
</html>
