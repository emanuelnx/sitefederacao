<div id="tf-home" class="slider">
    <div class="overlay">
        <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>

            <div class="carousel-inner" role="listbox">
                <div class="item active">
                    <img src="<?=IMAGENS?>bg/banner01.png" alt="...">
                    <div class="carousel-caption">
                        <div class="content-heading text-center">
                            <h1>Pratique / Filie-se / Kickboxing</h1>
                            <p class="lead">We create beautiful, innovative and  effective handcrafted brands & website.</p>
                            <a href="#tf-works" class="scroll goto-btn text-uppercase">View Our Works</a> <!-- Link to your portfolio section -->
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img src="<?=IMAGENS?>bg/banner02.png" alt="...">
                    <div class="carousel-caption">
                        <div class="content-heading text-center">
                            <h1>Confederação Brasileira de Kickboxing</h1>
                            <p class="lead">We create beautiful, innovative and  effective handcrafted brands & website.</p>
                            <a href="#tf-contact" class="scroll goto-btn text-uppercase">Entre em contato</a> <!-- Link to your portfolio section -->
                        </div>
                    </div>
                </div>

                <div class="item">
                    <img src="<?=IMAGENS?>bg/banner03.png" alt="...">
                    <div class="carousel-caption">
                        <div class="content-heading text-center"> <!-- Input Your Home Content Here -->
                            <h1>We Delivery Our Promise.</h1>
                            <p class="lead">We create beautiful, innovative and  effective handcrafted brands & website.</p>
                            <a href="#tf-about" class="scroll goto-btn text-uppercase">Learn More</a> <!-- Link to your portfolio section -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php if(isset($historias) && count($historias)) { ?>
    <div id="tf-about" class="gray-bg"> <!-- classe que coloca o background totalmente cinza -->
        <div class="container">
            <div class="vline"></div> <!--  Cria uma linha vertical -->
            <div id="process" class="row">
                <div class="col-md-10 col-md-offset-1">
                <?php   foreach ($historias as $key => $historia) { ?>
                            <div class="media process"> <!-- Process #1 -->
                                <div class="media-right media-middle">
                                    <i class="fa fa-search-plus"></i>
                                </div>
                                <div class="media-body">
                                    <a href="<?=base_url("historias/{$historia->id}")?>" target="_blank">
                                    <h4 class="media-heading"><strong><?=$historia->titulo?></strong></h4>
                                    </a>
                                    <p><?=substr($historia->conteudo, 0,500) ?>...</p>
                                </div>
                            </div>
                <?php   } ?>                        
                </div>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(isset($patrocinadores) && count($patrocinadores)) { ?>
    <div id="tf-team">
        <div class="container">
            <div class="section-header">
                <h2>No time de patrocinadores <span class="highlight"><strong>TIME</strong></span></h2>
                <h5><em>Venha, entre para esse time.</em></h5>
                <div class="fancy"><span><img src="<?=IMAGENS?>favicon.ico" alt="..."></span></div>
            </div>
            <div id="team" class="owl-carousel owl-theme text-center">
                <?php   foreach ($patrocinadores as $key => $patrocinador) { ?>
                            <div class="item">
                                <div class="hover-bg">
                                    <div class="hover-text off">
                                        <p><?=$patrocinador->conteudo?></p>
                                    </div>
                                    <img src="<?=$patrocinador->imagem?>" alt="<?=$patrocinador->titulo?>" class="img-responsive">
                                    <div class="team-detail text-center">
                                        <h3><?=$patrocinador->titulo?></h3>
                                        <p class="text-uppercase"><?=$patrocinador->subtitulo?></p>
                                        <ul class="list-inline social"> 
                                            <li><a href="#" class="fa fa-facebook"></a></li>
                                            <li><a href="#" class="fa fa-twitter"></a></li>
                                            <li><a href="#" class="fa fa-google-plus"></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                <?php   } ?>
            </div>
        </div>
    </div>
<?php } ?>

<?php if(isset($noticias) && count($noticias)) { ?>
    <div id="tf-blog">
        <div class="container">
            <div class="section-header">
                <h2>Noticias sobre a  <span class="highlight"><strong>Federação</strong></span></h2>
                <h5><em>Tudo sobre o Kickboxing Piauiense</em></h5>
                <div class="fancy"><span><img src="<?=IMAGENS?>favicon.ico" alt="..."></span></div>
            </div>
        </div>

        <div id="blog-post" class="gray-bg">
            <div class="container">
                <div class="row">
                    <?php 
                        $divAberta = false;
                        foreach ($noticias as $key => $noticia):
                            // abre a div na primeira iteracao e/ou cada tres iteracoes.
                            if($key == 0 || ($key+1)% 3 == 0) {
                                // fechando a div apos 3 iteracoes
                                if($divAberta) {echo '</div>';}
                                echo '<div class="col-md-6">';
                                $divAberta = true;
                            }
                    ?>
                                    <div class="post-wrap">
                                        <div class="media post">
                                            <div class="media-left"> 
                                                <a href="<?=base_url('noticias/'.$noticia->id)?>" target="_blank">
                                                  <img class="media-object" width="120" height="150" src="<?=$noticia->imagem?>" alt="<?=$noticia->titulo?>">
                                                </a>
                                            </div>
                                            <div class="media-body">
                                                <p class="small"><?=dataHoraBrasileira($noticia->created_at,false)?></p>
                                                <a href="<?=base_url('noticias/'.$noticia->id)?>" target="_blank">
                                                    <h5 class="media-heading"><strong><?=$noticia->titulo?></strong></h5>
                                                </a>
                                                <p><?=substr($noticia->conteudo, 0,100)?>...</p>
                                            </div>
                                        </div>
                                        
                                        <div class="post-meta">
                                            <ul class="list-inline metas pull-left">
                                                <li><a href="#">Por <?=$noticia->usuario_id?></a></li>
                                                <!-- <li><a href="#"><?php//echo $noticia->qtdComentarios?> Comentários</a></li> -->
                                                <li><a href="#">0 Comentários</a></li>
                                                <li><a href="<?=base_url('noticias/'.$noticia->id)?>" target="_blank">Leia mais</a></li>
                                            </ul>
                                            <ul class="list-inline meta-detail pull-right">
                                                <li><a href="#"><i class="fa fa-heart"></i></a> <?=$noticia->aprovacao?></li>
                                                <li><i class="fa fa-eye"></i> <?=$noticia->acessos?></li>
                                            </ul>
                                        </div> 
                                    </div>
                    <?php
                        endforeach; 
                    ?>
                </div>
                <div class="text-center">
                    <a href="#" class="btn btn-primary tf-btn color">Mais notícias</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>

        <div id="tf-contact">

            <div class="container"> <!-- container -->
                <div class="section-header">
                    <h2>Deseja saber alguma coisa <span class="highlight"><strong>Contate-nos</strong></span></h2>
                    <h5><em>Indo em busca do mais forte...</em></h5>
                    <div class="fancy"><span><img src="<?=IMAGENS?>favicon.ico" alt="..."></span></div>
                </div>
            </div><!-- end container -->

            <div class="container"><!-- container -->
                <div class="row"> <!-- outer row -->
                    <div class="col-md-10 col-md-offset-1"> <!-- col 10 with offset 1 to centered -->
                        <div class="row"> <!-- nested row -->

                            <!-- contact detail using col 4 -->
                            <div class="col-md-4">  
                                <div class="contact-detail">
                                    <i class="fa fa-map-marker"></i>
                                    <h4>Rua Nilo Peçanha 1809 Lourival Parente, 64023077 Teresina</h4> <!-- address -->
                                </div>
                            </div>
                            <!-- contact detail using col 4 -->
                            <div class="col-md-4">
                                <div class="contact-detail">
                                    <i class="fa fa-envelope-o"></i>
                                    <h4>fpikickboxing@bol.com.br</h4><!-- email add -->
                                </div>
                            </div>

                            <!-- contact detail using col 4 -->
                            <div class="col-md-4">
                                <div class="contact-detail">
                                    <i class="fa fa-phone"></i>
                                    <h4>+613 0000 0000</h4> <!-- phone no. -->
                                </div>
                            </div>

                        </div> <!-- end nested row -->
                    </div> <!-- end col 10 with offset 1 to centered -->
                </div><!-- end outer row -->

                <div class="row text-center"> <!-- contact form outer row with centered text-->
                    <div class="col-md-10 col-md-offset-1"> <!-- col 10 with offset 1 to centered -->
                        <form id="contact-form" class="form" name="sentMessage" novalidate> <!-- form wrapper -->

                            <div class="row"> <!-- nested inner row -->
                                <!-- Input your name -->
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- Your name input -->
                                        <input type="text" autocomplete="off" class="form-control" placeholder="Seu Nome *" id="name" required data-validation-required-message="Por favor digite seu nome.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <!-- Input your email -->
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- Your email input -->
                                        <input type="email" autocomplete="off" class="form-control" placeholder="Seu Email *" id="email" required data-validation-required-message="Por favor digite seu e-mail.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <!-- Input your Phone no. -->
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- Your email input -->
                                        <input type="text" autocomplete="off" class="form-control" placeholder="Seu Telefone. *" id="phone" required data-validation-required-message="Por favor digite seu telefone.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                            </div><!-- end nested inner row -->

                                <div class="form-group"> <!-- Your email input -->
                                    <textarea class="form-control" rows="7" placeholder="Perguntenos alguma coisa..." id="message" required data-validation-required-message="Por favor digite uma mensagem."></textarea>
                                    <p class="help-block text-danger"></p>
                                    <div id="success"></div>
                                </div>
                                <button type="submit" class="btn btn-primary tf-btn color">Enviar Mensagem</button> <!-- Send button -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>