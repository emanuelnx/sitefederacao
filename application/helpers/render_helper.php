<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url')) {
	function asset_url($template = "") {
		if ($template) {
			$template = "application/template/$template/";
		}
		return base_url().$template.'assets/';
	}
}

if (!function_exists('upload_url')) {
	function upload_url($url = '') {
		return base_url().'assets/uploads'.$url;
	}
}

if (!function_exists('assetsJs')) {
	function assetsJs($assets,$local = 'footer',$template = '') {
		if (isset($assets['js']['compartilhado'][$local]) && count($assets['js']['compartilhado'][$local])) {
			foreach ($assets['js']['compartilhado'][$local] as $key => $js) {
				echo '<script type="text/javascript" src="'.asset_url().'js/'.$js.'"></script>';
			}
		}

		if (isset($assets['js'][$template][$local]) && count($assets['js'][$template][$local])) {
			foreach ($assets['js'][$template][$local] as $key => $js) {
				echo '<script type="text/javascript" src="'.asset_url($template).'js/'.$js.'"></script>';
			}
		}
	}
}

if (!function_exists('assetsCss')) {
	function assetsCss($assets,$template = '') {
		if (isset($assets['css']['compartilhado']) && count($assets['css']['compartilhado'])) {
			foreach ($assets['css']['compartilhado'] as $key => $css) {
				echo '<link rel="stylesheet" type="text/css"  href="'.asset_url().'css/'.$css.'">';
			}
		}

		if (isset($assets['css'][$template]) && count($assets['css'][$template])) {
			foreach ($assets['css'][$template] as $key => $css) {
				echo '<link rel="stylesheet" type="text/css"  href="'.asset_url($template).'css/'.$css.'">';
			}
		}
	}
}

if (!function_exists('is_checked')) {
	function is_checked($valorInput, $valorComparacao ,$padrao = false) {
		if (empty($valorComparacao)) {
			return $padrao;
		}

		return ($valorComparacao == $valorInput) ? 'checked' : '';
	}
}

if (!function_exists('showErrorHtml')) {
	function showErrorHtml($msg) {
		if($msg) {
        	return '<div class="callout callout-danger"><h4>Aviso</h4><p>'.$msg.'</p></div>';
		}
	}
}

if (!function_exists('showSuccessHtml')) {
	function showSuccessHtml($msg) {
		if($msg) {
        	return '<div class="callout callout-success"><h4>Sucesso</h4><p>'.$msg.'</p></div>';
		}
	}
}

if (!function_exists('showInfoHtml')) {
	function showInfoHtml($msg) {
		if($msg) {
        	return '<div class="callout callout-info"><h4>Informação</h4><p>'.$msg.'</p></div>';
		}
	}
}

if (!function_exists('inputEnviaOuExibir')) {
	function inputEnviaOuExibir($name,$acao,$input='') {
		$retorno = '';
		if ($acao == 'exibir') {
			switch ($input) {
				case 'chk':
					$retorno = ' disabled name = "'.$name.'"';
					break;
				default:
					$retorno = ' readonly ';
					break;
			}
			return $retorno;
		}
		return ' name = "'.$name.'"';
	}
}