<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* executa a ultima migracao manualmente, acessando via url.
	* Utilizado para testes.
	*/
	class Gerador extends CI_controller {

		public function __construct() {
			parent::__construct();
			$this->load->model('gerador_m');
		}
		
		public function index() {
			$dados = array(
				'pagina' => 'gerador.php',
				'tituloPagina' => TITULOPAGINA,
				'selectTabelas' => form_dropdown('', $this->gerador_m->getTables()),
				'assets' => array()
			);

			$this->load->view('root/container_root.php',$dados);
		}

		public function gerar() {
			$this->classe = ucfirst($this->input->post['tabela']);
			$this->tabela = strtolower($this->input->post['tabela']).'s';
			$this->modulo = $this->modulo.'s';
			$this->dados = $this->campos;
		}

		public function criarViewForm(){
			$f = fopen(APPPATH."views/admin/{$modulo}/index.php", "w");

			$str =
		    '<div class="box">
			    <div class="box-header">
			        <h3 class="box-title">CADASTRAR</h3>
			    </div>
			    <div class="box-body pad">
			        <form method="post" action="<?=$action?>">
			            <input type="hidden" name="id" value="<?=(isset($'.$this->tabela.'[0]->id)) ? $'.$this->tabela.'[0]->id : \'\';?>">
			            <div class="form-group">
			                <label>Descrição</label>
			                <input type="text" name="titulo" class="form-control" value="<?=(isset($historia[0]->titulo)) ? $historia[0]->titulo : \'\';?>">
			            </div>
			            <div class="form-group">
			                <label>Status</label>
			                <select name="status">
			                    <options value="1" <?=(isset($historia[0]->status) && $historia[0]->status == 1) ? \'checked\' : \'\';?> >Ativo</options>
			                    <options value="0" <?=(isset($historia[0]->status) && $historia[0]->status == 0) ? \'checked\' : \'\';?> >Inativo</options>
			                </select>
			            </div>
			            <input type="submit" class="btn btn-info" value="<?=$btnSubmit?>">
			        </form>
			    </div>
			</div>';

			fwrite($f, $str);
			fclose($f);
		}

		public function criarViewIndex(){
			$f = fopen(APPPATH."views/admin/{$modulo}/index.php", "w");

			$str =
		    '<div class="box">
		        <div id="list" class="row"> 
		            <div class="table-responsive col-md-12">
		             <a href="<?=base_url(\'admin/'.$this->modulo.'/cadastrar\')?>" class="btn btn-primary pull-right h2">Novo Item</a>
		                <table class="table table-striped" cellspacing="0" cellpadding="0">
		                    <thead>
		                        <tr>
		                            <th>Código</th>
		                            <th>Título</th>
		                            <th>Data</th>
		                            <th class="actions">Ações</th>
		                        </tr>
		                    </thead>
		                    <tbody>
		                    <?php   foreach ($'.$this->modulo.' as $'.$this->tabela.'): ?>
		                                <tr>
		                                    <td><?=$'.$this->tabela.'->id?></td>
		                                    <td><?=$'.$this->tabela.'->titulo?></td>
		                                    <td><?=dataHoraBrasileira($'.$this->tabela.'->created_at)?></td>
		                                    <td class="actions" WIDTH="200" HEIGHT="30">
		                                        <a class="btn btn-success btn-xs pull-left" href="view.html">Exibir</a>
		                                        <form action="<?=base_url("'.$this->modulo.'/editar");?>" method="post" enctype="multipart/form-data">
		                                            <input type="hidden" name="id" value="<?=$'.$this->tabela.'->id?>">
		                                            <input type="submit" class="btn btn-warning btn-xs pull-left" value="Editar"/>
		                                        </form>
		                                        <form action="<?=base_url("'.$this->modulo.'/excluir");?>" method="post" enctype="multipart/form-data">
		                                            <input type="hidden" name="id" value="<?=$'.$this->tabela.'->id?>">
		                                            <input type="submit" class="btn btn-danger btn-xs pull-left" data-toggle="modal" data-target="#delete-modal" value="Excluir"/>
		                                        </form>
		                                    </td>
		                                </tr>
		                    <?php   endforeach; ?>
		                    </tbody>
		                </table>
		            </div>
		        </div>
		        <?php   if (!count($'.$this->modulo.')): ?>
		                    <div class="alert alert-info">Sem registros</div>
		        <?php   endif; ?>
		    </div>';

			fwrite($f, $str);
			fclose($f);
		}

		public function criarModel(){
			$f = fopen(APPPATH."models/{$modulo}.php", "w");

			$str = 
			"<?php;
			if (!defined(\"BASEPATH\")) exit(\"No direct script access allowed\");
			class {$this->classe}_model extends MY_Model {
			    public function __construct() {
			        $this->table = '{$this->tabela}';
	        		parent::__construct();
			    }
			}";

			fwrite($f, $str);
			fclose($f);
		}

		public function criarController(){

			$classe = $this->classe;
			$modulo = $this->modulo;
			$f = fopen(APPPATH."controllers/{$modulo}.php", "w");

			$str = 
			"<?php;
			if (!defined(\"BASEPATH\")) exit(\"No direct script access allowed\");
			class {$classe}s extends CI_Controller {
			    public function __construct() {
			        parent::__construct();
			        $this->load->model(array('{$classe}_model'));
					$this->load->helper(array('datas'));
					$this->dadosView['template'] = 'admin';
			    }

				public function index() {
					$this->paginaAdministrativa();

					$this->dadosView['{$modulo}'] = $this->{$classe}_model->pegueTodos();
					$this->dadosView['pagina'] = 'admin/{$modulo}/index.php';
					$this->load->view('admin/container.php',$this->dadosView);
				}

				public function exibir() {
					$id = $this->uri->segment(2);
					if (empty($id)) {
						show_404();
					}

					$this->dadosView['{$modulo}'] = $this->{$classe}_model->ache($id);

					if ($this->ehAdmin()) {
						$this->dadosView['pagina'] = 'admin/{$modulo}/index.php';
						$this->load->view('admin/container.php',$this->dadosView);
					} else {
						$this->dadosView['pagina'] = 'site/{$modulo}.php';
						$this->dadosView['template'] = 'site';
						$this->load->view('container_externo.php',$this->dadosView);
					}
				}

				public function cadastrar() {
					$this->paginaAdministrativa();

					$this->dadosView['action'] = base_url('{$modulo}');
					$this->dadosView['btnSubmit'] = 'Cadastrar';
					$this->dadosView['pagina'] = 'admin/{$modulo}/_form.php';

					$this->load->view('admin/container.php',$this->dadosView);
				}

				public function criar() {
					$this->paginaAdministrativa();
					// implementar
					echo 'criar';
				}

				public function editar() {
					$this->paginaAdministrativa();
					$id = $this->input->post('id');

					$this->dadosView['action'] = base_url('{$modulo}/atualizar');
					$this->dadosView['btnSubmit'] = 'Atualizar';
					$this->dadosView['historia'] = $this->{$classe}_model->ache($id);
					$this->dadosView['pagina'] = 'admin/{$modulo}/_form.php';

					$this->load->view('admin/container.php',$this->dadosView);
				}

				public function atualizar() {
					$this->paginaAdministrativa();
					$id = $this->input->post('id');

					/* dados da view ex:
					$dados = array(
						'titulo' => $this->input->post('titulo'),
						'status' => $this->input->post('status'),
						'conteudo' => $this->input->post('conteudo')
					);*/

					if ($this->{$classe}_model->atualiza($id, $dados)) {
			        	$_SESSION['sucesso'] = 'Atualizado com sucesso';
					} else {
						$_SESSION['erro'] = 'Erro ao atualizar! contate o administrador do sistema.';
					}
					redirect(base_url('{$modulo}'));
				}

				public function excluir() {
					$this->paginaAdministrativa();
					$id = $this->input->post('id');
					// implementar
					echo 'excluir '.$id;
				}
			}";

			fwrite($f, $str);
			fclose($f);
	    }
	}