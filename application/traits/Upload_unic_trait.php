<?php

	trait Upload_unic {
		// Método que processar o upload do arquivo
	    public function Upload($nome){
	    	if (empty($_FILES['userfile']['name'])) {
	    		return true;
	    	}

	    	// $CI =& get_instance();
		    $path = $this->pathUpload.$this->pastaUpload;
		    $this->load->helper('diretorio');
		    criarPastas($path);
	 
	        // definimos as configurações para o upload
	        // determinamos o path para gravar o arquivo
	        $config['upload_path'] = $path;
	        // definimos - através da extensão - os tipos de arquivos suportados
	        $config['allowed_types'] = 'jpg|png|gif';
	        // sobreescreve os arquivos com mesmo nome.
	        $config['overwrite'] = true;
	        // alterando o nome do arquivo
	        $config['file_name'] = $nome;

	        // passamos as configurações para a library upload
	        $this->load->library('upload', $config);
	 
	        // verificamos se o upload foi processado com sucesso
	        if (!$this->upload->do_upload()) {
	            // retornando o erro.
	            return $this->upload->display_errors();
	        }
			//var_dump($this->upload->data()); //recuperamos os dados do arquivo
	        return true;
	    }
	}