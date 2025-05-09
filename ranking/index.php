<!DOCTYPE html>
<html>
<head>
    <title>Cadastro de Ranking</title>
</head>
<body>

    <h2>Cadastro no Ranking</h2>
        <form action="salvar.php" method="POST">
            <label>Nome:</label><br>
            <input type="text" name="nome" required><br><br>

            <label>Nota (0 a 10):</label><br>
            <input type="number" name="nota" step="0.1" min="0" max="10" required><br><br>

            <label>Tipo de Ranking:</label><br>
            <select name="tipo" required>
                <option value="Filmes">Filmes</option>
                <option value="Músicas">Músicas</option>
                <option value="Livros">Livros</option>
                <option value="Jogos">Jogos</option>
            </select><br><br>

            <button type="submit">Adicionar</button>
        </form>

    <p><a href="listar.php">Ver Top 10 Ranking</a></p>

</body>
</html>
