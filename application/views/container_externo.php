<!DOCTYPE html>
<html lang="en">
	<?php require(APPPATH."template/{$template}/head.php");?>
	<body>
		<?php 
			require(APPPATH."template/{$template}/nav.php");
			require(APPPATH."views/".$pagina);
		?>
	</body>
	<?php 
		require(APPPATH."template/{$template}/footer.php");
		assetsJs($assets,'footer');
	?>
</html>