

    <!-- Main Navigation 
    ================================================== -->
    <nav id="tf-menu" class="navbar navbar-default navbar-fixed-top">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
              <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
              <a class="navbar-brand" href="#"><img src="<?=IMAGENS?>logocbkb.png" alt="..."></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
              <ul class="nav navbar-nav navbar-right">
                <li><a href="#tf-home" class="scroll">Home</a></li>
                <li><a href="#tf-team" class="scroll">Patrocinios</a></li>
                <li><a href="#tf-about" class="scroll">Historia</a></li>
                <li><a href="#tf-blog" class="scroll">Blog</a></li>
                <li><a href="#tf-contact" class="scroll">Contato</a></li>
              </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

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

        <!-- Team Section
        ================================================== -->
        <div id="tf-team">
            <div class="container"> <!-- container -->
                <div class="section-header">
                    <h2>No time de patrocinadores <span class="highlight"><strong>TIME</strong></span></h2>
                    <h5><em>Venha, entre para esse time.</em></h5>
                    <div class="fancy"><span><img src="<?=IMAGENS?>favicon.ico" alt="..."></span></div>
                </div>

                 <div id="team" class="owl-carousel owl-theme text-center"> <!-- team carousel wrapper -->

                    <div class="item"><!-- Team #1 -->
                        <div class="hover-bg"> <!-- Team Wrapper -->
                            <div class="hover-text off"> <!-- Hover Description -->
                                <p>Referencia em equipamentos para atletas em geral. Produtos de qualidade, com representação a nivel estadual.</p>
                            </div><!-- End Hover Description -->
                            <img src="<?=IMAGENS?>team/01.png" alt="..." class="img-responsive"> <!-- Team Image -->
                            <div class="team-detail text-center">
                                <h3>Kimono & Cia</h3>
                                <p class="text-uppercase">Nutrydiet</p>
                                <ul class="list-inline social"> 
                                    <li><a href="#" class="fa fa-facebook"></a></li> <!-- facebook link here -->
                                    <li><a href="#" class="fa fa-twitter"></a></li> <!-- twitter link here -->
                                    <li><a href="#" class="fa fa-google-plus"></a></li> <!-- google plus link here -->
                                </ul>
                            </div>
                        </div><!-- End Team Wrapper -->
                    </div><!-- End Team #1 -->

                    <div class="item"> <!-- Team #2 -->
                        <div class="hover-bg"> <!-- Team Wrapper -->
                            <div class="hover-text off"> <!-- Hover Description -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Dolore, esse dicta corrupti provident, voluptas nulla sed, omnis quidem, vero aspernatur a eaque! Architecto eligendi veritatis, molestiae quibusdam nemo consectetur ea..</p>
                            </div> <!-- End Hover Description -->
                            <img src="<?=IMAGENS?>team/02.png" alt="..." class="img-responsive"><!-- Team Image -->
                            <div class="team-detail text-center">
                                <h3>Cara do sumô</h3>
                                <p class="text-uppercase">Ajuda a ganhar peso</p>
                                <ul class="list-inline social"> 
                                    <li><a href="#" class="fa fa-facebook"></a></li> <!-- facebook link here -->
                                    <li><a href="#" class="fa fa-twitter"></a></li> <!-- twitter link here -->
                                    <li><a href="#" class="fa fa-google-plus"></a></li> <!-- google plus link here -->
                                </ul>
                            </div>
                        </div> <!-- End Team Wrapper -->
                    </div><!-- End Team #2 -->

                    <div class="item"> <!-- Team #3 -->
                        <div class="hover-bg"> <!-- Team Wrapper -->
                            <div class="hover-text off"> <!-- Hover Description -->
                                <p>Vivamus aliquet rutrum dui a varius. Mauris ornare tortor in eleifend blanditullam ut ligula et neque. Nec bibendum erat volutpat ultricies. Aliquet rutrum dui a varius. Mauris ornare tortor. </p>
                            </div> <!-- End Hover Description -->
                            <img src="<?=IMAGENS?>team/03.png" alt="..." class="img-responsive"><!-- Team Image -->
                            <div class="team-detail text-center">
                                <h3>Cara bombado</h3>
                                <p class="text-uppercase">reinador</p>
                                <ul class="list-inline social"> 
                                    <li><a href="#" class="fa fa-facebook"></a></li> <!-- facebook link here -->
                                    <li><a href="#" class="fa fa-twitter"></a></li> <!-- twitter link here -->
                                    <li><a href="#" class="fa fa-google-plus"></a></li> <!-- google plus link here -->
                                </ul>
                            </div>
                        </div><!-- End Team Wrapper -->
                    </div><!-- End Team #3 -->

                    <div class="item"><!-- Team #4 -->
                        <div class="hover-bg"> <!-- Team Wrapper -->
                            <div class="hover-text off"> <!-- Hover Description -->
                                <p>Aliquet rutrum dui a varius. Mauris ornare tortor in eleifend blanditullam ut ligula et neque. Quis placerat dui. Duis lacinia nisi sit ansequat lorem nunc, nec bibendum erat volutpat ultricies.</p>
                            </div> <!-- End Hover Description -->
                            <img src="<?=IMAGENS?>team/01.jpg" alt="..." class="img-responsive"> <!-- Team Image -->
                            <div class="team-detail text-center">
                                <h3>Maria Shara</h3>
                                <p class="text-uppercase">Founder / CEO</p>
                                <ul class="list-inline social"> 
                                    <li><a href="#" class="fa fa-facebook"></a></li> <!-- facebook link here -->
                                    <li><a href="#" class="fa fa-twitter"></a></li> <!-- twitter link here -->
                                    <li><a href="#" class="fa fa-google-plus"></a></li> <!-- google plus link here -->
                                </ul>
                            </div>
                        </div> <!-- End Team Wrapper -->
                    </div><!-- End Team #4 -->

                    <div class="item"><!-- Team #5 -->
                        <div class="hover-bg"> <!-- Team Wrapper -->
                            <div class="hover-text off"> <!-- Hover Description -->
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minus ipsum, expedita ducimus eveniet dolor quae iusto voluptate ipsa veniam non qui ea animi necessitatibus iste dolores, id magnam dignissimos facere?.</p>
                            </div> <!-- End Hover Description -->
                            <img src="<?=IMAGENS?>team/03.png" alt="..." class="img-responsive"> <!-- Team Image -->
                            <div class="team-detail text-center">
                                <h3>Cara bombado</h3>
                                <p class="text-uppercase">Treinador</p>
                                <ul class="list-inline social"> 
                                    <li><a href="#" class="fa fa-facebook"></a></li> <!-- facebook link here -->
                                    <li><a href="#" class="fa fa-twitter"></a></li> <!-- twitter link here -->
                                    <li><a href="#" class="fa fa-google-plus"></a></li> <!-- google plus link here -->
                                </ul>
                            </div>
                        </div> <!-- End Team Wrapper -->
                    </div><!-- End Team #5 -->

                </div> <!-- end team carousel wrapper -->

            </div> <!-- container -->
        </div>

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
                                <h4>Jl. Pahlawan VII No.247-D Sidoarjo-Surabaya-Indonesia</h4> <!-- address -->
                            </div>
                        </div>
                        <!-- contact detail using col 4 -->
                        <div class="col-md-4">
                            <div class="contact-detail">
                                <i class="fa fa-envelope-o"></i>
                                <h4>rudhisasmito@gmail.com</h4><!-- email add -->
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

