       

    <!-- Home Section
     ================================================== -->
        <div id="tf-home" class="slider">
            <div class="overlay"> <!-- Overlay Color -->
                <div id="carousel-example-generic" class="carousel slide carousel-fade" data-ride="carousel">
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                    </ol>

                      <!-- Wrapper for slides -->
                      <div class="carousel-inner" role="listbox">
                        <div class="item active">
                            <img src="<?=IMAGENS?>bg/banner01.png" alt="...">
                            <div class="carousel-caption">
                                <div class="content-heading text-center"> <!-- Input Your Home Content Here -->
                                    <h1>Pratique / Filie-se / Kickboxing</h1>
                                    <p class="lead">We create beautiful, innovative and  effective handcrafted brands & website.</p>
                                    <a href="#tf-works" class="scroll goto-btn text-uppercase">View Our Works</a> <!-- Link to your portfolio section -->
                                </div><!-- End Input Your Home Content Here -->
                            </div>
                        </div>

                        <div class="item">
                            <img src="<?=IMAGENS?>bg/banner02.png" alt="...">
                            <div class="carousel-caption">
                                <div class="content-heading text-center"> <!-- Input Your Home Content Here -->
                                    <h1>Confederação Brasileira de Kickboxing</h1>
                                    <p class="lead">We create beautiful, innovative and  effective handcrafted brands & website.</p>
                                    <a href="#tf-contact" class="scroll goto-btn text-uppercase">Entre em contato</a> <!-- Link to your portfolio section -->
                                </div><!-- End Input Your Home Content Here -->
                            </div>
                        </div>

                        <div class="item">
                            <img src="<?=IMAGENS?>bg/banner03.png" alt="...">
                            <div class="carousel-caption">
                                <div class="content-heading text-center"> <!-- Input Your Home Content Here -->
                                    <h1>We Delivery Our Promise.</h1>
                                    <p class="lead">We create beautiful, innovative and  effective handcrafted brands & website.</p>
                                    <a href="#tf-about" class="scroll goto-btn text-uppercase">Learn More</a> <!-- Link to your portfolio section -->
                                </div><!-- End Input Your Home Content Here -->
                            </div>
                        </div>
                      </div>
                </div>
            </div><!-- End Overlay Color -->
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
                                            <p><?=$historia->conteudo?></p>
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

        <!--  Blog Section
            ================================================== -->
            <div id="tf-blog">
                <div class="container"> <!-- container -->
                    <div class="section-header">
                        <h2>Noticias sobre a  <span class="highlight"><strong>Federação</strong></span></h2>
                        <h5><em>Tudo sobre o Kickboxing Piauiense</em></h5>
                        <div class="fancy"><span><img src="<?=IMAGENS?>favicon.ico" alt="..."></span></div>
                    </div>
                </div>

                <div id="blog-post" class="gray-bg"> <!-- fullwidth gray background -->
                    <div class="container"><!-- container -->

                        <div class="row"> <!-- row -->
                            <div class="col-md-6"> <!-- Left content col 6 -->

                                <div class="post-wrap"> <!-- Post Wrapper -->
                                    <div class="media post"> <!-- post wrap -->
                                        <div class="media-left"> 
                                            <a href="#"> <!-- link to your post single page -->
                                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p class="small">January 14, 2015</p>
                                            <a href="#">
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                                        </div>
                                    </div><!-- end post wrap -->
                                    
                                    <div class="post-meta"> <!-- Meta details -->
                                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                            <li><a href="#">Read More</a></li> <!-- read more link -->
                                        </ul>
                                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                                        </ul>
                                    </div><!-- end Meta details --> 
                                </div><!-- end Post Wrapper -->

                                <div class="post-wrap"> <!-- Post Wrapper -->
                                    <div class="media post"> <!-- post wrap -->
                                        <div class="media-left"> 
                                            <a href="#"> <!-- link to your post single page -->
                                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p class="small">January 14, 2015</p>
                                            <a href="#">
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                                        </div>
                                    </div><!-- end post wrap -->
                                    
                                    <div class="post-meta"> <!-- Meta details -->
                                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                            <li><a href="#">Read More</a></li> <!-- read more link -->
                                        </ul>
                                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                                        </ul>
                                    </div><!-- end Meta details --> 
                                </div><!-- end Post Wrapper -->

                                <div class="post-wrap"> <!-- Post Wrapper -->
                                    <div class="media post"> <!-- post wrap -->
                                        <div class="media-left"> 
                                            <a href="#"> <!-- link to your post single page -->
                                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p class="small">January 14, 2015</p>
                                            <a href="#">
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                                        </div>
                                    </div><!-- end post wrap -->
                                    
                                    <div class="post-meta"> <!-- Meta details -->
                                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                            <li><a href="#">Read More</a></li> <!-- read more link -->
                                        </ul>
                                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                                        </ul>
                                    </div><!-- end Meta details --> 
                                </div><!-- end Post Wrapper -->

                            </div> <!-- end Left content col 6 -->

                            <div class="col-md-6"> <!-- right content col 6 -->

                                <div class="post-wrap"> <!-- Post Wrapper -->
                                    <div class="media post"> <!-- post wrap -->
                                        <div class="media-left"> 
                                            <a href="#"> <!-- link to your post single page -->
                                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p class="small">January 14, 2015</p>
                                            <a href="#">
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                                        </div>
                                    </div><!-- end post wrap -->
                                    
                                    <div class="post-meta"> <!-- Meta details -->
                                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                            <li><a href="#">Read More</a></li> <!-- read more link -->
                                        </ul>
                                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                                        </ul>
                                    </div><!-- end Meta details --> 
                                </div><!-- end Post Wrapper -->

                                <div class="post-wrap"> <!-- Post Wrapper -->
                                    <div class="media post"> <!-- post wrap -->
                                        <div class="media-left"> 
                                            <a href="#"> <!-- link to your post single page -->
                                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p class="small">January 14, 2015</p>
                                            <a href="#">
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                                        </div>
                                    </div><!-- end post wrap -->
                                    
                                    <div class="post-meta"> <!-- Meta details -->
                                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                            <li><a href="#">Read More</a></li> <!-- read more link -->
                                        </ul>
                                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                                        </ul>
                                    </div><!-- end Meta details --> 
                                </div><!-- end Post Wrapper -->

                                <div class="post-wrap"> <!-- Post Wrapper -->
                                    <div class="media post"> <!-- post wrap -->
                                        <div class="media-left"> 
                                            <a href="#"> <!-- link to your post single page -->
                                              <img class="media-object" src="http://placehold.it/120x150" alt="..."> <!-- Your Post Image -->
                                            </a>
                                        </div>
                                        <div class="media-body">
                                            <p class="small">January 14, 2015</p>
                                            <a href="#">
                                                <h5 class="media-heading"><strong>Vel donec et scelerisque vestibulum. Condimentum aliquam, mollit magna velit nec</strong></h5>
                                            </a>
                                            <p>Tempor vestibulum turpis id ligula mi mattis. Eget arcu vitae mauris amet odio. Diam nibh diam, quam elit, libero nostra ut. Pellentesque vehicula. Eget sed, dapibus </p>
                                        </div>
                                    </div><!-- end post wrap -->
                                    
                                    <div class="post-meta"> <!-- Meta details -->
                                        <ul class="list-inline metas pull-left"> <!-- post metas -->
                                            <li><a href="#">by Rudhi Design</a></li> <!-- meta author -->
                                            <li><a href="#">20 Comments</a></li> <!-- meta comments -->
                                            <li><a href="#">Read More</a></li> <!-- read more link -->
                                        </ul>
                                        <ul class="list-inline meta-detail pull-right"> <!-- user meta interaction -->
                                            <li><a href="#"><i class="fa fa-heart"></i></a> 50</li> <!-- like button -->
                                            <li><i class="fa fa-eye"></i> 110</li> <!-- no. of views -->
                                        </ul>
                                    </div><!-- end Meta details --> 
                                </div><!-- end Post Wrapper -->

                            </div><!-- end right content col 6 -->
                        </div><!-- end row -->

                        <div class="text-center">
                            <a href="#" class="btn btn-primary tf-btn color">Load More</a>
                        </div>                
                    </div><!-- end container -->
                </div> <!-- end fullwidth gray background -->
            </div>

    <!-- Contact Section
        ================================================== -->
        <div id="tf-contact">

            <div class="container"> <!-- container -->
                <div class="section-header">
                    <h2>Feel Free to <span class="highlight"><strong>Contact Us</strong></span></h2>
                    <h5><em>We design and build functional and beautiful websites</em></h5>
                    <div class="fancy"><span><img src="<?=IMAGENS?>favicon.ico" alt="..."></span></div>
                </div>
            </div><!-- end container -->

            <div id="map"></div>  <!-- google map -->

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
                                        <input type="text" autocomplete="off" class="form-control" placeholder="Your Name *" id="name" required data-validation-required-message="Please enter your name.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <!-- Input your email -->
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- Your email input -->
                                        <input type="email" autocomplete="off" class="form-control" placeholder="Your Email *" id="email" required data-validation-required-message="Please enter your email address.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                                <!-- Input your Phone no. -->
                                <div class="col-md-4">
                                    <div class="form-group"> <!-- Your email input -->
                                        <input type="text" autocomplete="off" class="form-control" placeholder="Your Phone No. *" id="phone" required data-validation-required-message="Please enter your phone no.">
                                        <p class="help-block text-danger"></p>
                                    </div>
                                </div>

                            </div><!-- end nested inner row -->

                        <!-- Message Text area -->
                                <div class="form-group"> <!-- Your email input -->
                                    <textarea class="form-control" rows="7" placeholder="Tell Us Something..." id="message" required data-validation-required-message="Please enter a message."></textarea>
                                    <p class="help-block text-danger"></p>
                                    <div id="success"></div>
                                </div>
                                <button type="submit" class="btn btn-primary tf-btn color">Send Message</button> <!-- Send button -->

                            </form><!-- end form wrapper -->
                        </div><!-- end col 10 with offset 1 to centered -->
                    </div> <!-- end contact form outer row with centered text-->

                </div><!-- end container -->

            </div>

