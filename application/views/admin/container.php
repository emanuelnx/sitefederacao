<!DOCTYPE html>
<html lang="en">
	<?php require(APPPATH."template/{$template}/head.php");?>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
		<?php 
			require(APPPATH."template/{$template}/nav.php");
			require(APPPATH."views/".$pagina);
			require(APPPATH."template/{$template}/footer.php");
			assetsJs($assets,'footer');
		?>
		</div>
	</body>
</html>