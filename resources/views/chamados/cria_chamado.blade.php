<!DOCTYPE html>
<html>
<head>
    <title>Novo Chamado</title>
</head>
<body>
    <h1>Abrir Chamado de Suporte</h1>

    <form action="{{ route('chamados.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="titulo">Título:</label><br>
        <input type="text" name="titulo" id="titulo" required><br><br>

        <label for="descricao">Descrição:</label><br>
        <textarea name="descricao" id="descricao" rows="5" required></textarea><br><br>

        <label for="imagem">Anexar imagem (opcional):</label><br>
        <input type="file" name="imagem" id="imagem" accept="imagem"><br><br>

        <label for="prioridade">Prioridade:</label><br>
        <select name="prioridade" id="prioridade">
            <option value="baixa">Baixa</option>
            <option value="média" selected>Média</option>
            <option value="alta">Alta</option>
        </select><br><br>

        <button type="submit">Enviar</button>
    </form>
</body>
</html>
