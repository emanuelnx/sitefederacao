<!DOCTYPE html>
<html lang="en">
	<?php require(APPPATH."template/{$template}/head.php");?>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php require(APPPATH."template/{$template}/nav.php"); ?>
			<div class="content-wrapper">
			<?php 
				require(APPPATH."template/{$template}/menu.php");
				require(APPPATH."views/".$pagina);
			?>
			</div>
			<?php
				require(APPPATH."template/{$template}/footer.php");
				assetsJs($assets,'footer');
			?>
		</div>
	</body>
</html>