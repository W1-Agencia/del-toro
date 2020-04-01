<?php 
    require_once "connection/connection.php";
    require_once "connection/close_connection.php";
    require_once "require/functions/select.php";
    $items = select("promotions","*","id");
    $configuration = select("configuration","*","id");
    $slides = select("slide","*","id");
    

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

  <title>Del'Toro Hamburgueria & Steak House Artesanal</title>
  <link rel="stylesheet" href="<?= BASE_CSS ?>bootstrap.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>owl.carousel.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>jquery.fancybox.min.css">
  <link rel="stylesheet" href="<?= BASE_CSS ?>estilo.min.css">
  <link href="https://fonts.googleapis.com/css?family=Baloo+Chettan+2|Bebas+Neue|Neucha&display=swap" rel="stylesheet">
</head>
<body class = "fundo-preto">
    <?php require "components/header.php"; ?>
    <!-- corpo do site -->

      <section id="slide">
          <div class = "container-fluid pt-5 pb-5 text-center slide-img" id = "">
                <div  class="owl-carousel owl-theme">
                    <?php for($i = 0;$i < count($slides); $i ++) : ?>
                    <div class="item">
                        <!-- item de slide -->
                        <div class="row mt-5 pt-5">
                            <div class="col-md mt-5 pt-5 ">
                                <h1 class = "display-1 fonte-secundaria cor-amarelo"><?=$slides[$i]['title']?></h1>
                                <h2 class = "cor-branco"><?=$slides[$i]['text']?></h2>
                                <p class = "mt-5"><a href="<?= BASE ?>cardapios" class = "botao-principal">VER CARDÁPIOS</a></p>
                            </div><!-- col-md -->
                        </div><!-- row -->
                    </div><!-- item -->
                    <?php endfor;?>
                </div><!-- owl-carousel -->
                <div class="owl-theme"><div class="owl-controls"><div class="custom-nav owl-nav"></div></div>

            <div class="row pt-5 mt-5">
                <div class="col-md mb-5 pb-5 ">
                    <div class="middle"><div class="mouse"></div></div>
                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->
      </section><!-- slider -->

      <section id="cardapios" class = "pt-5 pb-5">
        <div class = "container pt-5 pb-5 mb-5 mt-5 text-center">
            <div class="row pt-5 pb-5">
                <div class="col-md-7">&nbsp;</div><!-- col-md -->
                <div class="col-md-5 text-center">
                    <h1 class = "display-3 fonte-secundaria cor-amarelo">CARDÁPIOS</h1>
                    <p><img src="<?= BASE_IMG ?>extra/linha-branco.png" width = "200px" ></p>
                    <h5 class = "cor-branco">Confira todas as nossas delícias. Hamburguers, Porções, Bebidas e Combos</h5>
                    <p class = "mt-5"><a href="<?= BASE ?>cardapios" class = "botao-secundario">VER CARDÁPIOS</a></p>
                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->
      </section>

      <section id="promocao" class = "pt-5 pb-5">
        <div class = "container pt-5 mt-5 text-center">
            <div class="row">
                <div class="col-md">
                    <h1 class = "display-3 fonte-secundaria cor-amarelo">DEL'PROMO DO DIA</h1>
                    <p><img src="<?= BASE_IMG ?>extra/linha-preto.png" width = "200px" ></p>
                </div><!-- col-md -->
            </div><!-- row -->
            <div class="row pt-5 pb-5 mb-5">
                <div class="col-md">

                    <div class="owl-carousel owl-theme">
                        <?php for($i=0;$i<count($items);$i++) : ?>
                            <?php if($items[$i]['date_end'] >= date('Y-m-d') && $items[$i]['date_init'] <= date('Y-m-d')) :?>
                        <div class="item">
                            <!-- item de slide -->
                            <div class="row">
                                <div class="col-md-5 text-center">
                                    <div class="img-promo" style = "background-image: url('<?= BASE_IMG_ADMIN ?>promotions/<?=$items[$i]['namedir']?>');">

                                    </div>
                                   
                                </div><!-- col-md -->
                                <div class="col-md-1"></div>
                                <div class="col-md-5 text-left mt-5">
                                    <h2 class = "negrito"><?=$items[$i]['name_prod']?></h2>
                                    <h5 class = "cor-cinza"><?=$items[$i]['descriptions_prod']?></h5>
                                    <p class = "fonte-secundaria cor-vermelho fonte-30 mt-4 mb-4"> <?= number_format($items[$i]['value_prod'], 2, ',', '.') ?></p>
                                    <p><a href="https://api.whatsapp.com/send?phone=5567999448730&text=Oi! Gostaria de fazer um pedido do item da promoção: <?=$items[$i]['name_prod']?> por <?= number_format($items[$i]['value_prod'], 2, ',', '.')?> que encontrei no site da Del'Toro." id="combo" target = "_blank" class = "botao-terceiro">PEDIR COMBO</a></p>
                                </div><!-- col-md  -->
                            </div><!-- row -->
                            <!-- item de slide fim -->
                        </div><!-- item -->
                        <?php endif;?>
                        <?php endfor;?>
                    </div><!-- owl-carousel -->
                    <div class="owl-theme"><div class="owl-controls"><div class="custom-nav owl-nav"></div></div>
                </div>
            </div><!-- row -->
        </div><!-- container -->
      </section>

      <section id="sobre" class = "pt-5 pb-5">
        <div class = "container pt-5 mt-5 text-center">
            <div class="row">
                <div class="col-md">
                    <h1 class = "display-3 fonte-secundaria cor-preto">SOBRE O DEL'TORO</h1>
                    <p><img src="<?= BASE_IMG ?>extra/linha-amarela.png" width = "200px" ></p>
                </div><!-- col-md -->
            </div><!-- row -->
            <div class="row pt-5 pb-5">
                <div class="col-md-5 mb-5 text-left cor-preto">
                    <h5 class = "cor-preto">
                        <?=$configuration[0]['text']?>
                    </h5>
                    <p class = "mt-5"><a href="#" class = "botao-terceiro" data-toggle="modal" data-target="#modalSobre">LEIA MAIS</a></p>
                </div><!-- col-md -->
                <div class="col-md-1"></div>
                <div class="col-md-6">
                    <a href="#" class = "" data-toggle="modal" data-target="#modalSobreFoto">
                        <img src="<?= BASE_IMG ?>extra/quem-somos-foto.png" width = "100%" alt="">
                    </a>
                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->

                    <!-- Modal quem somos -->
                    <div class="modal fade bd-example-modal-lg" id="modalSobre" tabindex="-1" role="dialog" aria-labelledby="modalSobre" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                            <a href ="" class="close fonte-20 cor-branco botao-secundario" data-dismiss="modal" aria-label="Close">
                                &times;
                            </a>
                        </div>
                        <div class="modal-body text-center">
                                <img src="<?= BASE_IMG ?>logo/del-toro-marca.png" width="100px" data-wow-delay="0.5s" class = "wow bounceInLeft inicial-logo">
                                <hr>
                                <p class = "cor-branco fonte-18">
                                    A Del’Toro Hamburgueria Steak House Artesanal surgriu da união entre o conhecimento e o querer oferecer uma experiência especial a quem mora ou visita a fronteira mais integrada do mundo.  
                                </p>
                                <p class = "cor-branco fonte-18">
                                    Em contraponto ao fast-food e ao industrial, a equipe Del’Toro busca o natural, o orgânico, os sabores de raiz que nos fazem viajar nas memórias sensoriais. As receitas artesanais com foto total na experiência, usando ingredientes de qualidade, oferecem-nos um contato com os sabores dos campos, os aromas da fazenda e as cores reais da natureza. 
                                </p>
                                <p class = "cor-branco fonte-18">
                                    Nosso compromisso com a seriedade e qualidade é total. São escolhidos os melhores cortes de carnes, as verduras mais frescas e os alimentos mais naturais. Evitamos ao máximo o uso de ingredientes industrializados. As geleias são feitas à mão, o pão australiano (feito com cevada, mel e cacau), as maioneses com plantas e temperos frescos.  
                                </p>
                                <p class = "cor-branco fonte-18">
                                    Parcerias com os melhores mestres cervejeiros nacionais e internacionais foram criadas para oferecer a harmonização perfeita com seu preto. São mais de 30 rótulos de cervejas artesanais disponíveis para seu deleite. 
                                </p>
                        </div>
                        <div class="modal-footer">
                            <a href = "" class="botao-secundario float-left" data-dismiss="modal">FECHAR</a>
                        </div>
                        </div>
                    </div>
                    </div>

                    <!-- Modal quem somos foto -->
                    <div class="modal fade bd-example-modal-xl" id="modalSobreFoto" tabindex="-1" role="dialog" aria-labelledby="modalSobreFoto" aria-hidden="true">
                    <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
                        <div class="modal-content">
                        <div class="modal-header">
                        <h3 class="modal-title cor-branco fonte-secundaria" id="exampleModalLabel">CONHEÇA O DEL'TORO</h3>
                            <a href ="" class="close fonte-20 cor-branco botao-secundario" data-dismiss="modal" aria-label="Close">
                                &times;
                            </a>
                        </div>
                        <div class="modal-body text-center">
                                <div class="foto-sobre mt-5 mb-5">
                                    <div  class="owl-carousel owl-theme">
                                        <div class="item">
                                            <a data-fancybox="gallery" href="<?= BASE_IMG ?>/fotos-local/15430012785bf854be7a321.png">
                                                <div class = "foto-sobre-item" style = "background-image: url(<?= BASE_IMG ?>fotos-local/15430012785bf854be7a321.png);"></div>
                                            </a>
                                        </div><!-- item -->
                                        <div class="item">
                                            <a data-fancybox="gallery" href="<?= BASE_IMG ?>/fotos-local/15657253695d5312b98a115.png">
                                                <div class = "foto-sobre-item" style = "background-image: url(<?= BASE_IMG ?>fotos-local/15657253695d5312b98a115.png);"></div>
                                            </a>
                                        </div><!-- item -->
                                        <div class="item">
                                            <a data-fancybox="gallery" href="<?= BASE_IMG ?>/fotos-local/147454864257e3d3a299472.png">
                                                <div class = "foto-sobre-item" style = "background-image: url(<?= BASE_IMG ?>fotos-local/147454864257e3d3a299472.png);"></div>
                                            </a>
                                        </div><!-- item -->
                                    </div><!-- owl-carousel -->
                                    <div class="owl-theme"><div class="owl-controls"><div class="custom-nav owl-nav"></div></div>
                                </div><!-- foto sobre -->
                        </div>
                        <div class="modal-footer">
                            <a href = "" class="botao-secundario float-left" data-dismiss="modal">FECHAR</a>
                        </div>
                        </div>
                    </div>
                    </div>
      </section>

      <section id="localizacao" class = "pt-5">
        <div class = "container-fluid pt-5 mt-5 text-center">
            <div class="row">
                <div class="col-md">
                    <h1 class = "display-3 fonte-secundaria cor-preto">NOSSA LOCALIZAÇÃO</h1>
                    <p><img src="<?= BASE_IMG ?>extra/linha-amarela.png" width = "200px" ></p>
                    <h3>Faça-nos uma visita e experiemente as iguaria</h3>
                </div><!-- col-md -->
            </div><!-- row -->
            <div class="row pt-5">
                <div class="col-md-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3684.4587480366877!2d-55.70191088525566!3d-22.561939431328277!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x94626e77ac094c9b%3A0x67f1aa58dabde6ee!2sDel&#39;Toro%20Hamburgueria%20%26%20Steak%20House%20Artesanal!5e0!3m2!1spt-BR!2sbr!4v1584479626003!5m2!1spt-BR!2sbr" width="100%" height="400" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->
      </section>

      <section id="contato" class = "pt-5 pb-5">
        <div class = "container pt-5 mt-5 text-center">
            <div class="row">
                <div class="col-md">
                    <h1 class = "display-3 fonte-secundaria cor-amarelo">FALE CONOSCO</h1>
                    <p><img src="<?= BASE_IMG ?>extra/linha-branco.png" width = "200px" ></p>
                </div><!-- col-md -->
            </div><!-- row -->
            <div class="row pt-5 pb-5">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-6 pt-3 mb-5">

                              <div class="row">
                                  <div class="col-3 col-md-2">
                                      <img src="<?= BASE_IMG ?>icones/whatsapp.png" alt="">
                                  </div>
                                  <div class="col-9 col-md text-left">
                                      <p class = "cor-amarelo fonte-secundaria fonte-24">WHATSAPP<br><span class = "cor-branco">+55 67 99944-8730</span> </p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-3 col-md-2">
                                    <img src="<?= BASE_IMG ?>icones/sms.png" alt="">
                                  </div>
                                  <div class="col-9 col-md text-left">
                                      <p class = "cor-amarelo fonte-secundaria fonte-24">EMAIL<br><span class = "cor-branco">contato@deltoro.com</span> </p>
                                  </div>
                              </div>
                              <div class="row">
                                  <div class="col-3 col-md-2">
                                    <img src="<?= BASE_IMG ?>icones/waiter.png" alt="">
                                  </div>
                                  <div class="col-9 col-md text-left">
                                      <p class = "cor-amarelo fonte-secundaria fonte-24">EXPEDIENTE<br><span class = "cor-branco">18:00h à 00:00h (Segunda a Sábado)</span> </p>
                                  </div>
                              </div>

                        </div>
                        <div class="col-md-6">
                            <form id = "contato-formulario">
                              <div class="form-group">
                                <input type="text" class="form-control" id="nome" placeholder = "Nome completo">
                              </div>
                              <div class="form-group">
                                <input type="email" class="form-control" id="email" placeholder = "E-mail">
                              </div>
                              <div class="form-group">
                                <input type="tel" class="form-control" id="tel" placeholder = "Telefone com DDD">
                              </div>
                              <div class="form-group">
                                <textarea class="form-control" id="msg" rows="3" placeholder = "Mensagem"></textarea>
                              </div>
                              <div class="form-group text-left">
                                <button type="submit" class="botao-principal">ENVIAR AGORA</button>
                              </div>
                            </form>                            
                        </div>
                    </div>
                </div><!-- col-md -->
            </div><!-- row -->
        </div><!-- container -->
      </section>
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
