<!DOCTYPE html>
<html lang="en">
	<?php require("header_root.php");?>
	<body>
		<?php require($pagina);?>
	</body>
	<?php 
		require("footer_root.php");
		printAssets('js',$assets);
	?>
</html>