<?php
session_start();
if (!isset($_SESSION['logado'])) {
  header('Location: login.php');
  exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Adicionar Carro</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'menu.php'; ?>
<main>
  <form action="salvar.php" method="POST" enctype="multipart/form-data">
    <label>Nome do carro:</label>
    <input type="text" name="nome" required>
    <label>Descrição:</label>
    <textarea name="descricao" required></textarea>
    <label>Imagem:</label>
    <input type="file" name="imagem" accept="image/*" required>
    <button type="submit">Adicionar</button>
  </form>
</main>
</body>
</html>