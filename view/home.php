<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css">
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

  <div class="container mt-4">
    <h1>Bem-vindo ao sistema de gerenciamento RH</h1>
    <p>Sistema onde é possível Criar, consultar, atualizar e deletar usuários.</p>

    <div class="row">
    <p>Por que devo adquirir um sistema assim na minha empresa?</p>
      <div class="col-md-6">
        <div class="card">
          <img src="https://as2.ftcdn.net/v2/jpg/02/18/05/89/500_F_218058910_efumNQIvJuklIvt5MgmpBQ2LBs6zr2RL.jpg" class="card-img-top" alt="Imagem 1">
          <div class="card-body">
            <h5 class="card-title">Escalabilidade do negócio</h5>
            <p class="card-text">Com um sistema gerenciamento é possível aumentar sua escalabilidade de maneira exponencial.</p>
          </div>
        </div>
      </div>

      <div class="col-md-6">
        <div class="card">
          <img src="https://as2.ftcdn.net/v2/jpg/02/49/69/87/500_F_249698708_XXOHe6fQaU4bTfB3xs0GeOnUbch2p1MD.jpg" class="card-img-top" alt="Imagem 2">
          <div class="card-body">
            <h5 class="card-title">Tenha total controle sobre sua empresa</h5>
            <p class="card-text">Com um Sistema de gerenciamento é possível fazer várias operações dinâmicas em tempo real.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <div class="col-md-4">
        <div class="card">
          <img src="https://www.trustenablement.com/wp-content/uploads/2022/04/project-management.png" class="card-img-top" alt="Imagem 3">
          <div class="card-body">
            <h5 class="card-title">Rapidez no gerenciamento</h5>
            <p class="card-text">Com apenas alguns cliques é possível controlar funcionários e suas pendências.</p>
          </div>
        </div>
      </div>
        
      <div class="col-md-4">
        <div class="card">
          <img src="https://5.imimg.com/data5/FM/GU/MY-24966275/multi-business-solution-500x500.jpg" class="card-img-top" alt="Imagem 4">
          <div class="card-body">
            <h5 class="card-title">Aplicabilidade</h5>
            <p class="card-text">Soluções multi-bussiness que podem ser aplicadas em qualquer negócio</p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <footer class="footer bg-dark text-white text-center py-3">
  <div class="container">
    <span>© 2023 CRUD Básico. Todos os direitos reservados.</span>
  </div>
</footer>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
