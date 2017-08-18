<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>404 Page Not Found</title>
	<style type="text/css">
		.center {text-align: center; margin-left: auto; margin-right: auto; margin-bottom: auto; margin-top: auto;}
	</style>
</head>
<body>
	<div id="container">
		<h1><?php echo $heading; ?></h1>
		<?php echo $message; ?>

		<div class="row">
			<div class="span12">
			  <div class="hero-unit center">
			      <h1>Página não encontrada <small><font face="Tahoma" color="red">Error 404</font></small></h1>
			      <br />
			      <p>Entre em contato com o webmaster ou tente novamente depois.</p>
			      <a href="<?=base_url()?>" class="btn btn-large btn-info"><i class="icon-home icon-white"></i> Ir para a Home</a>
			   </div>
			</div>
		</div>
	</div>
</body>
</html>