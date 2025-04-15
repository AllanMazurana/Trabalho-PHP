<?php
$carros = json_decode(file_get_contents('data/carros.json'), true);
$id = $_GET['id'] ?? null;
$carro = null;
session_start();

foreach ($carros as $c) {
  if ($c['id'] == $id) {
    $carro = $c;
    break;
  }
}

if (!$carro) {
  echo "Carro não encontrado.";
  exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Detalhes do Carro</title>
  <link rel="stylesheet" href="css/style.css">
</head>
<body>
<?php include 'menu.php'; ?>
<main class="detalhes">
  <img src="imagens/<?= htmlspecialchars($carro['imagem']) ?>" alt="<?= htmlspecialchars($carro['nome']) ?>">
  <h2><?= htmlspecialchars($carro['nome']) ?></h2>
  <p><strong>Descrição:</strong> <?= htmlspecialchars($carro['descricao']) ?></p>
</main>
</body>
</html>