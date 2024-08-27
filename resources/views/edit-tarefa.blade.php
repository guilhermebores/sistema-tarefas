<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Tarefa</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Editar Tarefa</h1>
        <form action="{{ route('tarefas.update', $tarefa->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="titulo">Título</label>
                <input type="text" name="titulo" class="form-control" value="{{ $tarefa->titulo }}" required>
            </div>
            <div class="form-group">
                <label for="descricao">Descrição</label>
                <textarea name="descricao" class="form-control">{{ $tarefa->descricao }}</textarea>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" class="form-control" required>
                    <option value="pendente" {{ $tarefa->status == 'pendente' ? 'selected' : '' }}>Pendente</option>
                    <option value="concluída" {{ $tarefa->status == 'concluída' ? 'selected' : '' }}>Concluída</option>
                </select>
            </div>
            <button type="submit" class="btn btn-success">Atualizar</button>
            <a href="{{ route('tarefas.index') }}" class="btn btn-secondary">Cancelar</a>
        </form>
    </div>
</body>
</html>
