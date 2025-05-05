<?php
// conecta ao banco
$pdo = new PDO("mysql:host=localhost;dbname=ranking", "root", "");

// insere novo item
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['acao']) && $_POST['acao'] === 'inserir') {
    $nome = trim($_POST['nome']); // nome do item
    $nota = floatval($_POST['nota']); // nota inserida em decimal
    $tipo = $_POST['tipo']; // tipo do ranking

    // valida os dados
    if ($nome !== "" && $nota >= 0 && $nota <= 10 && $tipo !== "") {
        $stmt = $pdo->prepare("INSERT INTO entradas (nome, nota, tipo) VALUES (:nome, :nota, :tipo)");
        $stmt->execute([
            ':nome' => $nome,
            ':nota' => $nota,
            ':tipo' => $tipo
        ]);
    }

    // tava dando repetição no f5, dai ele redireciona pra evitar isso
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// exclui um item baseado no ID
if (isset($_GET['excluir'])) {
    $id = intval($_GET['excluir']); 
    $stmt = $pdo->prepare("DELETE FROM entradas WHERE id = :id");
    $stmt->execute([':id' => $id]);

    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// deixa por ordem das notas
$entradas = $pdo->query("SELECT id, nome, nota, tipo FROM entradas ORDER BY nota DESC LIMIT 10")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Ranking</title>
</head>
<body>

<h2>Ranking</h2>


<form method="POST">
    <input type="hidden" name="acao" value="inserir"> 

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

<h3>Top 10 Ranking</h3>
<table border="1">
    <tr>
        <th>Nome</th>
        <th>Nota</th>
        <th>Tipo de Ranking</th> 
        <th>Ação</th>
    </tr>
    
    <?php foreach ($entradas as $entrada): ?>
        <tr>
            <td><?= htmlspecialchars($entrada['nome']) ?></td>
            <td><?= number_format($entrada['nota'], 1) ?></td>
            <td><?= htmlspecialchars($entrada['tipo']) ?></td> 
            <td><a href="?excluir=<?= $entrada['id'] ?>" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</a></td>
        </tr>
    <?php endforeach; ?>
</table>

</body>
</html>
