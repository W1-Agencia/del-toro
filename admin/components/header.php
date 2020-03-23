<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-admin">
  <a class="navbar-brand" href="admin.php">
    <img class="img-fluid img-logo-admin" src="require/img/w1.jpg" width="70px" height="70px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img src="require/img/menu.png" width="50px" heigth="30px"></span>
  </button>

  <div class="collapse navbar-collapse navbar-content-item" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="admin.php">Inicial</a></li>
      <li class="nav-item"><a class="nav-link" href="menu.php">Cardápio</a></li>
      <li class="nav-item"><a class="nav-link" href="promotions.php">Promoções</a></li>
    </ul>

    <div class="dropdown external-element">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="configurations.php">Sobre a empresa</a>
        <a class="dropdown-item" target="_blank" href="../">Ir para site</a>
        <a  class="dropdown-item" href="actions/logout.php">Sair</a>
      </div>
    </div>
  </div>

</nav>

