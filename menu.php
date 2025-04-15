<header>
  <nav>
    <ul>
      <H1>Carros Antigos</H1>
      
      <li><a href="index.php">Início</a></li>
      <?php if (isset($_SESSION['logado']) && $_SESSION['logado'] === true): ?>
        <li><a href="adicionar.php">Adicionar Carro</a></li>
        <li><a href="logout.php">Logout</a></li>
      <?php else: ?>
        <li><a href="login.php">Login</a></li>
      <?php endif; ?>
    </ul>
  </nav>
</header>
