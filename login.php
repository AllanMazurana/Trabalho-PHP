<?php
session_start();
$erro = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  $usuario = $_POST['usuario'];
  $senha = $_POST['senha'];

  if ($usuario === 'admin' && $senha === '123') {
    $_SESSION['logado'] = true;
    header('Location: adicionar.php');
    exit;
  } else {
    $erro = 'Usuário ou senha incorretos!';
  }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Login</title>
  <link rel="stylesheet" href="css/style.css">
  <style>h2{
  color: #333;
  margin-right: 50px;
}
form {
  display: flex;
  flex-direction: column;
  gap: 8px;
  padding: 16px;
  background-color: white;
  border-radius: 8px;
  box-shadow: 0 0 8px rgba(0, 0, 0, 0.1);
  width:20%; /* Largura ajustada para ser compacta */
}

</style>
</head>
<body>
<?php include 'menu.php'; ?>
<main>
  <h2>Login</h2>
  <?php if ($erro): ?>
    <p style="color: red;"><?= $erro ?></p>
  <?php endif; ?>
  <div class="centralizada">
  <form method="POST">
    <label>Usuário:</label>
    <input type="text" name="usuario" required>
    <label>Senha:</label>
    <input type="password" name="senha" required>
    <button type="submit">Entrar</button>
  </form>
  </div>
</main>
</body>
</html>