<?php
	defined('BASEPATH') OR exit('No direct script access allowed');

	/**
	* Responsavel por verificacoes e retornos de url de imagens
	* relacionadas com o padrao do sistema.
	*/
	trait Imagens {
		/**
		* Método que verifica e retorna a imagem padrao para o controller anexada no
		* indice imagem entiado no elemento de iteracao
		* por padrao esta imagem fica na pasta /assets/uploads/nomedocontroller/id.extensao
		* @param array - elemento de iteracao pode ser array de arrays ou array de objetos
		* @param String $diretorio - nome do diretorio em que a imagem deve estar salva
		*/
		public function inserirImagemPadrao($dados,$diretorio) {
			$this->load->helper('diretorio');

			if (empty($dados) || !is_array($dados)) {
				return $dados;
			}

			$urlExibicao = function($id, $diretorio) {
				$path = upload_path("/{$diretorio}/{$id}");

				if ($extensao = existeArquivoPasta($path,array('jpg','jpeg','gif','png'))) {
					return asset_url()."uploads/{$diretorio}/{$id}.{$extensao}";
				}

				return asset_url()."imagens/imgindisponivel.jpg";
			};

			foreach ($dados as $key => $dado) {
				if (is_object($dado)) {
					$dados[$key]->imagem = $urlExibicao($dado->id, $diretorio);
				} else {
					$dados[$key]['imagem'] = $urlExibicao($dado['id'], $diretorio);
				}
			}

			return $dados;
		}
	}