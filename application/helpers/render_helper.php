<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
	function asset_url() {
		return base_url().'assets/';
	}
}

/**
* IMPRIME O LINK DE TODOS OS ASSETS DO TIPO INFORMADO NA TELA
*/
function printAssets($tipo,$assets) {
	if (!isset($assets[$tipo])) { return; }

	switch ($tipo) {
		case 'css':
			assetsJs($assets['css']);
			break;
		case 'js':
			assetsCss($assets['js']);
			break;
	}
	
}

function assetsJs($assets) {
	if (!count($assets)) { return; }

	foreach ($assets as $key => $js) {
		echo '<script type="text/javascript" src="'.asset_url().'js/'.$js.'"></script>';
	}
}

function assetsCss($assets) {
	if (!count($assets)) { return; }

	foreach ($assets as $key => $css) {
		echo '<link rel="stylesheet" type="text/css"  href="'.asset_url().'css/'.$css.'">';
	}
}