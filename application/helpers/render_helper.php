<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

if (!function_exists('asset_url()')) {
	function asset_url($template = "") {
		if ($template) {
			$template = "application/template/$template/";
		}
		return base_url().$template.'assets/';
	}
}

if (!function_exists('upload_url()')) {
	function upload_url() {
		return base_url().'assets/upload';
	}
}

if (!function_exists('assetsJs()')) {
	function assetsJs($assets,$local = 'footer') {
		if (!count($assets['js'][$local])) { return; }

		foreach ($assets['js'][$local] as $key => $js) {
			echo '<script type="text/javascript" src="'.asset_url().'js/'.$js.'"></script>';
		}
	}
}

if (!function_exists('assetsCss()')) {
	function assetsCss($assets) {
		if (!count($assets['css'])) { return; }

		foreach ($assets['css'] as $key => $css) {
			echo '<link rel="stylesheet" type="text/css"  href="'.asset_url().'css/'.$css.'">';
		}
	}
}