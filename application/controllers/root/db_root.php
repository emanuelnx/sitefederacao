<?php
	defined('BASEPATH') OR exit('Script n�o pode ser acessado diretamente.');

	/**
	* Trabalha com backups para o banco
	* liste os backups dispon�veis
	* op��o para fazer o download do arquivo de backup de dentro da aplica��o
	* permita criar backups personalizados, escolhendo quais tabelas dever�o ser adicionadas
	* Nomeie os arquivos de backup usando a data da gera��o do mesmo, para facilitar a identifica��o
	*/
	class Gerador extends CI_controller {

		/**
		* nome das tabelas que deseja realizar o backup.
		* por padrao utiliza-se vazio que equivale a todas as tabelas.
		* @var array
		*/
		private $tabelas = array();

		/**
		* nome das tabelas que deseja retirar do backup.
		* por padrao utiliza-se vazio que equivale anenhuma tabela.
		* @var array
		*/
		private $tabelasOmitidas = array();

		/**
		* Formato de saida do backup. Aceitos: gzip, zip, txt
		* @var String
		*/
		private $formatoSaida = 'zip';

		/**
		* Informa se a classe deve ou nao realizar o download
		* @var bool
		*/
		private $realizarDownload = false;

		/**
		* Informa so caminho do download de backups
		* @var String
		*/
		private $path = APPPATH.'/download/backup/';

		public function __construct() {
			parent::__construct();
			$this->paginaAdministrativa();
		}
		
		public function index() {}

		private function backup() {

			$this->load->dbutil();

			$bkpcf = array(
			        'tables'        => $this->tabelas, // Lista de tabelas que ser�o adicionadas ao backup. Array vazio significa todas.
			        'ignore'        => $this->tabelasOmitidas, // Lista de tabelas que ser�o omitidas do backup. Array vazio significa nenhuma tabela.
			        'format'        => $this->formatoSaida, // Formato do backup: gzip, zip, txt
			        'filename'      => 'backup.sql', // Nome do arquivo (utilizado somente se o formato for ZIP)
			        'add_drop'      => TRUE, // Adi��o da string de DROP TABLE a saida do backup. Nao realiza o drop no banco.
			        'add_insert'    => TRUE, // Adi��o de INSERT (�til caso queira fazer o backup n�o s� da estrutura, mas tamb�m dos dados)
			        'newline'       => "\n" // Caracter usado para definir quebra de linha 
			);

			// Executa o backup do banco de dados armazenado-o em uma vari�vel
			$backup = $this->dbutil->backup($bkpcf);
			 
			// carrega o helper File e cria um arquivo com o conte�do do backup
			$this->load->helper('file');
			$this->load->helper('diretorio');
	    	criarPastas($this->path);
			write_file($this->path.'backup.'.$this->formatoSaida, $backup);
			
			if ($this->realizarDownload) {
				// Carrega o helper Download e for�a o download do arquivo que foi criado com 'write_file'
				$this->load->helper('download');
				force_download($this->path.'backup.'.$this->formatoSaida, $backup);
			}
		}
	}