<nav id="tf-menu" class="navbar navbar-default">
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
            <?php   if(isset($historias) && count($historias)) { ?>
                        <li><a href="#tf-about" class="scroll">Historia</a></li>
            <?php   } ?>
            <li><a href="#tf-team" class="scroll">Patrocinios</a></li>
            <li><a href="#tf-blog" class="scroll">Blog</a></li>
            <li><a href="#tf-contact" class="scroll">Contato</a></li>
            <?php   if(isset($_SESSION['logged_in']) && $_SESSION['logged_in'] === true) { ?>
                        <li><a href="<?=base_url('logout')?>" class="scroll">Sair</a></li>
            <?php   } else { ?>
                        <li><a href="<?=base_url('login')?>" class="scroll">Entrar</a></li>
                        <li><a href="<?=base_url('registrar')?>" class="scroll">Registrar-se</a></li>
            <?php   } ?>
          </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>