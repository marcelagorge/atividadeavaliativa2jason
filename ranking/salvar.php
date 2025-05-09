<?php
    require 'conexao.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $nome = trim($_POST['nome']);
        $nota = floatval($_POST['nota']);
        $tipo = $_POST['tipo'];

        if ($nome !== "" && $nota >= 0 && $nota <= 10 && $tipo !== "") {
            $stmt = mysqli_prepare($conexao, "INSERT INTO entradas (nome, nota, tipo) VALUES (?, ?, ?)");
            mysqli_stmt_bind_param($stmt, "sds", $nome, $nota, $tipo);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_close($stmt);
        }
    }

    mysqli_close($conexao);
    header("Location: index.php");
    exit;
?>
