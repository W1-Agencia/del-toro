<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

<nav class="navbar navbar-expand-lg navbar-admin">
  <a class="navbar-brand" href="<?=BASE?>">
    <img class="img-fluid img-logo-admin" src="<?=BASE?>require/img/w1.png" width="50px" height="50px">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"><img src="<?=BASE?>require/img/menu.png" width="50px" heigth="30px"></span>
  </button>

  <div class="collapse navbar-collapse navbar-content-item" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item"><a class="nav-link" href="<?=BASE?>./"> Inicial</a></li>
      <li class="nav-item"><a class="nav-link" href="<?=BASE?>slides"><i class="fab fa-accusoft"></i> Slides</a></li>
      <li class="nav-item">
      <div class="dropdown">
        <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Cardápios
        </button>
        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
          <a class="dropdown-item" href="<?=BASE?>tipo-alimento"><i class="far fa-bookmark"></i> Categorias de alimentos</a>
          <a class="dropdown-item" href="<?=BASE?>tipo-sub-alimento"><i class="far fa-bookmark"></i> Categorias do cardápio</a>
          <a class="dropdown-item" href="<?=BASE?>cardapios">Cardápios</a>
        </div>
      </div>

      </li>
      <li class="nav-item"><a class="nav-link" href="<?=BASE?>promocoes">Promoções</a></li>
    </ul>

    <div class="dropdown external-element">
      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-user"></i>
      </a>
      <div class="dropdown-menu" aria-labelledby="navbarDropdown">
        <a class="dropdown-item" href="<?=BASE?>configuracoes">Sobre a empresa</a>
        <a class="dropdown-item" target="/" href="../">Ir para site</a>
        <a  class="dropdown-item" href="<?=BASE?>logout">Sair</a>
      </div>
    </div>
  </div>

</nav>

