<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="/view/style.css">
  <title>CRUD BÁSICO</title>
  <style>
    .card {
      margin-bottom: 20px;
    }
  </style>
</head>
<body>  
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
      <a class="navbar-brand" href="/view/home.php">Home</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="/view/create.php">Cadastrar Usuário</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/view/delete.php">Deletar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/view/list.php">Consultar</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/view/update.php">Atualizar</a>
          </li>
        </ul>
     </div>
      
    </div>
  </nav>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>


