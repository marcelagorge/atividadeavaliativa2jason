<?php
    require 'conexao.php';

    $sql = "SELECT * FROM entradas ORDER BY nota DESC LIMIT 10";
    $resultado = mysqli_query($conexao, $sql);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Top 10 Ranking</title>
</head>
<body>

    <h2>Top 10 Ranking</h2>
        <table border="1">
            <tr>
                <th>Nome</th>
                <th>Nota</th>
                <th>Tipo</th>
            </tr>

            <?php while ($linha = mysqli_fetch_assoc($resultado)): ?>
                <tr>
                    <td><?= htmlspecialchars($linha['nome']) ?></td>
                    <td><?= number_format($linha['nota'], 1, ',', '.') ?></td>
                    <td><?= htmlspecialchars($linha['tipo']) ?></td>
                </tr>
            <?php endwhile; ?>
        </table>

    <p><a href="index.php">Voltar ao Cadastro</a></p>

</body>
</html>

<?php mysqli_close($conexao); ?>
