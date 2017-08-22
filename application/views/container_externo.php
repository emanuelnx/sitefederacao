<!DOCTYPE html>
<html lang="en">
	<?php require(ABSPATH."/application/template/{$template}/head.php");?>
	<body>
		<?php 
			require(ABSPATH."/application/template/{$template}/nav.php");
			require(ABSPATH."/application/views/".$pagina);
		?>
	</body>
	<?php 
		require(ABSPATH."/application/template/{$template}/footer.php");
		assetsJs($assets,'footer');
	?>
</html>