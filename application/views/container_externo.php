<!DOCTYPE html>
<html lang="en">
	<?php require(ABSPATH."/application/template/{$template}/head.php");?>
	<body>
		<?php 
			require(ABSPATH."/application/template/{$template}/nav.php");
			require($pagina);
		?>
	</body>
	<?php 
		require(ABSPATH."/application/template/{$template}/footer.php");
		assetsJs($assets,'footer');
	?>
</html>