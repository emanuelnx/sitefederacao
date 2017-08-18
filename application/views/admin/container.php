<!DOCTYPE html>
<html lang="en">
	<?php require(ABSPATH."/application/template/{$template}/head.php");?>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
		<?php 
			require(ABSPATH."/application/template/{$template}/nav.php");
			require(ABSPATH."/application/views/".$pagina);
			require(ABSPATH."/application/template/{$template}/footer.php");
			assetsJs($assets,'footer');
		?>
		</div>
	</body>
</html>