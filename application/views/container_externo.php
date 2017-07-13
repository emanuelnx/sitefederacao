<!DOCTYPE html>
<html lang="en">
	<?php require("header_externo.php");?>
	<body>
		<?php require($pagina);?>
	</body>
	<?php 
		require("footer_externo.php");
		printAssets('js',$assets);
	?>
</html>