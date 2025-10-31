<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Categorias</title>
    <link rel="stylesheet" href="https://cdn.simplecss.org/simple.css">
</head>
<body>
    <h1>Cadastro de Categorias</h1>

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

    <form method="POST" action="/categorias">
        @csrf
        <label>Nome da Categoria:</label>
        <input type="text" name="nome" value="{{ old('nome') }}">

        <button type="submit">Salvar</button>
    </form>

    <h2>Lista de Categorias</h2>
    <ul>
        @forelse($categorias as $categoria)
            <li>{{ $categoria->nome }}</li>
        @empty
            <li>Nenhuma categoria cadastrada.</li>
        @endforelse
    </ul>
</body>
</html>
