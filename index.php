<?php
$carros = json_decode(file_get_contents('data/carros.json'), true);
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Catálogo de Carros</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'menu.php'; ?>
<main class="catalogo">
  <?php foreach ($carros as $carro): ?>
    <div class="carro-card">
      <img src="imagens/<?= htmlspecialchars($carro['imagem']) ?>" alt="<?= htmlspecialchars($carro['nome']) ?>">
      <h2><?= htmlspecialchars($carro['nome']) ?></h2>
      <p><?= htmlspecialchars($carro['descricao']) ?></p>
      <a href="detalhes.php?id=<?= $carro['id'] ?>" class="ver-mais">Ver mais</a>
    </div>
  <?php endforeach; ?>
</main>
</body>
</html>