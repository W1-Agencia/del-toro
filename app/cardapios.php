<?php 
    require_once "connection/connection.php";
    require_once "connection/close_connection.php";
    require_once "require/functions/select.php";
    $categoria = select("tfood","*","id");
    //$subcategoria = select("mfood","*","id");
    //$cardapio = select("menu","*","id");

?>
<!doctype html>
<html>
<head>
  <meta charset="UTF-8">
  <meta name="viewport"              content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="description"           content="Delicie-se com a melhor Hamburgueria & Steak House Artesanal de Ponta Porã, MS."/>
  <meta name="author"                content="W1 Agência - http://w1agencia.com.br/"/>
  <meta name="keywords"              content="Cardápios, Lanchonete, Humbergueria, Steak House, churrasco, lanches, combos, Pedro Juan, Ponta Porã, MS"/>
  <meta name="robots"                content="index, follow" />

  <meta property="og:site_name"    content="Del'Toro Hamburgueria & Steak House Artesanal">
  <meta property="og:url"          content="<?= BASE ?>" />
  <meta property="og:type"         content="website" />
  <meta property="og:title"        content="Del'Toro Hamburgueria & Steak House Artesanal" />
  <meta property="og:description"  content="Delicie-se com a melhor Hamburgueria & Steak House Artesanal de Ponta Porã, MS. " />

  <title>Cardápio do Del'Toro Hamburgueria & Steak House Artesanal em Ponta Porã</title>
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>owl.carousel.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Bebas+Neue|Neucha&display=swap" rel="stylesheet">
</head>
<body class = "fundo-preto">
    <?php require "components/header.php"; ?>
    <!-- corpo do site -->

      <section id="cardapios-paginas">
          <div class = "container-fluid pt-5 pb-5 text-center slide-img" id = "">
            <div class="row mt-5 pt-5 pb-5 mb-5">
                <div class="col-md mt-5 pt-5 ">
                    <h1 class = "display-1 fonte-secundaria cor-amarelo pb-5">CARDÁPIO DO DEL'TORO</h1>
                    <ul class="nav justify-content-center nav-atalho-cardapio">
                        <?php for($i = 0;$i < count($categoria); $i++) :?>
                            <li class="nav-item">
                                <a class="nav-link" href="<?= BASE ?>cardapios#<?=strtolower($categoria[$i]['alimento'])?>"><?=strtolower($categoria[$i]['alimento'])?></a>
                            </li>
                        <?php endfor; ?>
                        </ul>                        
                </div><!-- col-md -->
            </div><!-- row -->
            <div class="row pt-5 ">
                <div class="col-md mb-5 pb-5 ">
                    <div class="middle"><div class="mouse"></div></div>
                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->
      </section><!-- slider -->

      <?php 
      for($i = 0;$i < count($categoria); $i++) :
        $subcategoria = select("mfood","*","id_categoria = ".$categoria[$i]['ordenation']);
      ?>
            
      <section id="<?=strtolower($categoria[$i]['alimento'])?>" class = " fundo-sessao-cardapios <?=strtolower($categoria[$i]['alimento'])?>">
        <div class = "container-fluid">
            <div class="row">
            
                <div class="col-md-4 p-5">
                    <h1 class = "pt-5 pb-5 mt-5 display-3 fonte-secundaria cor-branco texto-sombra"><?=$categoria[$i]['alimento']?></h1>
                </div><!-- col-md -->

                <div class="col-md-1 cardapios-sessao"><!-- nulo --></div>

                <div class = "col-md p-5 cardapios-sessao">

                    <!------------------- -->
                    <?php
                    if($subcategoria):
                        for($j = 0; $j < count($subcategoria); $j++) :
                    ?>
                    <div class="row pt-5 mb-1 mt-5">
                        <div class="col-md-11">
                            <?php 
                                $cardapio = select("menu","*","sub_id_product=".$subcategoria[$j]['ordenation']);
                                //$searchColumn = array_column($cardapio,'id_categoria');
                                //$products = array_search($subcategoria[$j]['ordenation'], $searchColumn);
                            ?>
                            <div class="titulo-cardapio text-center mb-5">
                                <h1 class = "display-4 fonte-secundaria cor-amarelo"><?=$subcategoria[$j]['subalimento'] ?></h1>
                                <p><img src="<?= BASE_IMG ?>extra/linha-branco.png" width = "200px" ></p>
                            </div><!-- titulo-cardapio -->  
                            <?php 
                            if($cardapio) :
                                foreach($cardapio as  $item): ?>
                                    <div class="item-cardapio mb-5">
                                    <h4 class = "cor-branco fonte-secundaria"><?=$item['name_product']?> | R$ <?=$item['value_product']?></h4>
                                    <p class = "cor-cinza italico"><?=$item['description_product']?></p>
                            </div>
                            <?php 
                                endforeach; 
                            endif;
                            ?>

                            <!-- <div class="item-cardapio mb-5">
                                <h4 class = "cor-branco fonte-secundaria">Batata rúscia especial | R$ 23,90</h4>
                                <p class = "cor-cinza italico">Batata rústica com bacon e cheddar.</p>
                            </div>item cardapio -->

                        </div><!-- col-md-->
                    </div><!-- row -->
                    <?php 
                        endfor; 
                    endif;    
                    ?>

                    <div class="row"><div class="col-md  text-right"><p><a href="#cardapios-paginas" class = "botao-topo">	&#65514; VOLTAR AO TOPO</a></p></div><!-- col-md --></div><!-- row -->

                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->
    </section>
    <?php endfor; ?>

    <!-- corpo do site - fim -->
    <?php require "components/footer.php"; ?>
  <!-- BOTAO FIXO DE RESERVA --><!-- BOTAO FIXO DE RESERVA - FIM -->
  <script src="<?= BASE_JS ?>jquery.js"></script>
  <script src="<?= BASE_JS ?>jquery.fancybox.min.js"></script>
  <script src="<?= BASE_JS ?>owl.carousel.min.js"></script>
  <script src="<?= BASE_JS ?>popper.min.js"></script>
  <script src="<?= BASE_JS ?>bootstrap.min.js"></script>
  <script src="<?= BASE_JS ?>estilo.js"></script>

</body>
</html>
