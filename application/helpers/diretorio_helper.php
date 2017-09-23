<?php
	if (!function_exists('criarPastas')) {
		function criarPastas($path) {
			$caminho = ABSPATH;
			$path = str_replace($caminho.'/', '', $path);
			$pastas = explode('/', $path);

			foreach ($pastas as $key => $pasta) {
				$caminho .= '/'.$pasta;
			    // cria a nova pasta se a mesma nao existir
				if(!is_dir($caminho)) {
					mkdir($caminho,0755,TRUE);
				}
			}
		}
	}

	if (!function_exists('existeArquivoPasta')) {
		/**
		* Verifica se existe o arquivo com alguma das extensoes informadas na pasta na pasta.
		* @param String $path - caminho completo com nome do arquivo sem a extensao
		* @param array $extensoes
		* @return bool
		*/
		function existeArquivoPasta($path,$extensoes) {
			$retorno = false;
			
			foreach ($extensoes as $key => $extensao) {
				if (file_exists($path.'.'.$extensao)) {
					$retorno = $extensao;
				}
			}

			return $retorno;
		}
	}

	if (!function_exists('upload_path')) {
		function upload_path($path = '') {
			return ABSPATH.'/assets/uploads'.$path;
		}
	}