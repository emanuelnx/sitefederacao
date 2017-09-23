<?php
	defined('BASEPATH') OR exit('Script não pode ser acessado diretamente.');

	/**
	* gera um CRUD basico baseado nos parametros passados
	*
	* trabalha co parametros
	* ex:
	* criar_modulo nome_da_tabela nome_do_campo1:tipo_do_campo1:se_nulo
	* OBSERVACOES:
	* por padrao o sistema ja ira criar os campos id:int:not_null:pk create_at:datetime:null update_at:datetime:null status:int:not_null
	*/
	class Gerador extends CI_controller {

		public function __construct() {
			parent::__construct();
		}
		
		public function index() {
			$dados = array(
				'pagina' => 'gerador.php',
				'tituloPagina' => TITULOPAGINA,
				'selectTabelas' => form_dropdown('', $this->gerador_m->getTables()),
				'assets' => array()
			);

			$this->load->view('root/container.php',$dados);
		}

		/**
		* recebe um comando e realiza a acao baseada neste comando.
		*/
		public function gerar() {
			$comando = $this->input->post['comando'];
			if (empty($comando)) {
				// enviar view erro geracao
				return;
			}
			$comando = strtolower($comando);
			$comando = explode(' ', $comando);

			// verificando o comando
			if (!in_array($comando[0], ['criar_modulo','remover_modulo','criar_controller','remover_controller','criar_model','remover_model','criar_migracao'])) {
				// enviar erro, acao nao informada
				return;
			}
			
			$tabela = $comando[1];
			$camposTabela = array();
			for ($i = 2; $i < count($comandos); $i++) {
				// padrao nome_do_campo:tipo_do_campo:nulo
				$campos = explode(':', $comandos[$i]);
				$camposTabela[$campos[0]] = $campos; 
			}

			$this->dadosGeracao = array(
				'controler' = ucfirst($tabela).'s',
				'model' = ucfirst($tabela).'_model',
				'tabela' = $tabela,
				'modulo' = $tabela.'s',
				'campos' = $camposTabela,
			);

			$this->{$comando[0]}();
		}

		private function criar_migracao() {}
		private function remover_model() {}
		private function remover_controller() {}
		private function remover_modulo() {
			// implementar remocao do scaffold completo
		}
		private function criar_modulo() {
			$this->criar_migracao();
			$this->criar_controller();
			$this->criar_model();
			$this->criarViewIndex();
			$this->criarViewForm();
		}

		/**
		* Cria a view _form administrador
		* @return bool
		*/
		public function criarViewForm() {
			try {
				$modulo = $this->dadosGeracao['modulo'];
				$campos = $this->dadosGeracao['campos'];
				$path = APPPATH."views/admin/{$modulo}/";
			    $this->load->helper('diretorio');
			    criarPastas($path);
				$f = fopen($path."_form.php", "w");

				$str = '
					<div class="box">
					    <?=showErrorHtml($erro);?>
					    <div class="box-header">
					        <h3 class="box-title"><?=strtoupper($objetivo)?> '.strtoupper($modulo).'</h3>
					        <br>
					        <div class="pull-right box-tools">
					            <button type="button" class="btn btn-default btn-sm" data-widget="collapse" data-toggle="tooltip" title="Collapse">
					                <i class="fa fa-minus"></i>
					            </button>
					        </div>
					    </div>
					    <div class="box-body pad">
					        <form method="post" action="<?=$action?>" enctype="multipart/form-data">
					            <input type="hidden" name="id" value="<?=(isset($tupla[0]->id)) ? $tupla[0]->id : '';?>">';
	                            foreach ($campos as $key => $campo) {
	                            	$campo = strtolower($campo);
	                            	switch ($campo) {
	                            		case 'status':
	                            			$str .= '<div class="form-control">
										                <label>Status</label>
										                <input type="radio" <?=inputEnviaOuExibir(\'status\',$objetivo,'chk')?> value="1" <?=is_checked('1', $tupla[0]->status, TRUE);?> >Ativo
										                <input type="radio" <?=inputEnviaOuExibir(\'status\',$objetivo,'chk')?> value="0" <?=is_checked('0', $tupla[0]->status);?> >Inativo
										            </div>';
	                            			break;
	                            		
	                            		default:
	                            			$str .= '<div class="form-group">
										                <label>'.ucfirst($campo).'</label>
										                <input type="text" <?=inputEnviaOuExibir(\''.$campo.'\',$objetivo)?> class="form-control" value="<?=(isset($tupla[0]->'.$campo.')) ? $tupla[0]->'.$campo.' : \'\';?>" placeholder="Insira um '.$campo.'">
										            </div>';
	                            			break;
	                            	}
	                            }

				$str .= '       <br>
					            <?php   if ($objetivo == \'exibir\'): ?>
					                        <div><img src="<?=$imagem?>"></div>
					                        <a href="<?=base_url(\'admin/'.$modulo.'\')?>" class="btn btn-info">Voltar</a>
					            <?php   else: ?>
					                        <div class="form-group">
					                            <input type="file" name="userfile" size="20" />
					                        </div>
					                        <input type="submit" class="btn btn-info" value="<?=ucfirst($objetivo)?>">
					            <?php   endif; ?>
					        </form>
					    </div>
					</div>
				';

				fwrite($f, $str);
				fclose($f);
				return true;
			} catch (Exception $e) {
				return false;
			}
		}

		/**
		* Cria a view _form administrador
		* @return bool
		*/
		public function criarViewIndex(){
			try {
				$modulo = $this->dadosGeracao['modulo'];
				$campos = $this->dadosGeracao['campos'];				
				$path = APPPATH."views/admin/{$modulo}/";
			    $this->load->helper('diretorio');
			    criarPastas($path);
				$f = fopen($path."index.php", "w");

				$str = '
					    <div class="box">
					        <div id="list" class="row"> 
					            <?=showErrorHtml($erro);?>
					            <?=showSuccessHtml($sucesso)?>
					            <div class="table-responsive col-md-12">
					             <a href="<?=base_url(\'admin/'.$modulo.'/cadastrar\')?>" class="btn btn-primary pull-right h2">Novo Item</a>
					                <table class="table table-striped" cellspacing="0" cellpadding="0">
					                    <thead>
					                        <tr>
					                            <th>Código</th>';
					                            foreach ($campos as $key => $campo) {
					                            	$str .= '<th>'.ucfirst($campo).'</th>';
					                            }
				$str .= '                      <th class="actions">Ações</th>
					                        </tr>
					                    </thead>
					                    <tbody>
					                    <?php   foreach ($tuplas as $tupla) { ?>
					                                <tr>
					                                    <td><?=$tupla->id?></td>';
					                                    foreach ($campos as $key => $campo) {
					                                    	$campo = strtolower($campo);
							                            	switch ($campo) {
							                            		case 'created_at':
							                            			$str .= '<td><?=dataHoraBrasileira(tupla->'.$campo.')?></td>'
							                            		case 'update_at':
							                            			$str .= '<td><?=dataHoraBrasileira(tupla->'.$campo.')?></td>'
							                            			break;
							                            		case 'status':
							                            			$str .= "<td><?=($tupla->status) ? 'ATIVO' : 'INATIVO';?></td>";
							                            			break;
							                            		
							                            		default:
							                            			$str .= '<th><?=$tupla->'.$campo.'?></th>';
							                            			break;
							                            	}
							                            }
				$str .= '                               <td class="actions" WIDTH="200" HEIGHT="30">
					                                        <a class="btn btn-success btn-xs pull-left" href="<?=base_url("admin/'.$modulo.'/exibir/".$tupla->id);?>">Exibir</a>
					                                        <form action="<?=base_url("'.$modulo.'/editar");?>" method="post" enctype="multipart/form-data">
					                                            <input type="hidden" name="id" value="<?=$tupla->id?>">
					                                            <input type="submit" class="btn btn-warning btn-xs pull-left" value="Editar"/>
					                                        </form>
					                                        <form action="<?=base_url("'.$modulo.'/excluir");?>" method="post" enctype="multipart/form-data">
					                                            <input type="hidden" name="id" value="<?=$tupla->id?>">
					                                            <input type="submit" class="btn btn-danger btn-xs pull-left" data-toggle="modal" data-target="#delete-modal" value="Excluir"/>
					                                        </form>
					                                    </td>
					                                </tr>
					                    <?php   } ?>
					                    </tbody>
					                </table>
					            </div>
					        </div>
					        <?php   if (!count($tuplas)) { echo showInfoHtml("Sem registros cadastrados");} ?>
					    </div>
				';

				fwrite($f, $str);
				fclose($f);
				return true;
			} catch (Exception $e) {
				return false;
			}
		}

		public function criar_model(){
			try {
				$modulo = $this->dadosGeracao['modulo'];
				$campos = $this->dadosGeracao['campos'];
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
				return true;
			} catch (Exception $e) {
				return false;
			}
		}

		public function criar_controller(){

				$modulo = $this->dadosGeracao['modulo'];
				$model = $this->dadosGeracao['model'];
			$f = fopen(APPPATH."controllers/{$modulo}.php", "w");

			$str = 
			"<?php;
			if (!defined(\"BASEPATH\")) exit(\"No direct script access allowed\");
			class {$this->dadosGeracao['controller']} extends CI_Controller {
			    public function __construct() {
			        parent::__construct();
			        $this->load->model(array('{$model}'));
					$this->load->helper(array('datas'));
					$this->dadosView['template'] = 'admin';
			    }

				public function index() {
					$this->paginaAdministrativa();

					$this->dadosView['tuplas'] = $this->{$model}->pegueTodos();
					$this->dadosView['pagina'] = 'admin/{$modulo}/index.php';
					$this->load->view('admin/container.php',$this->dadosView);
				}

				public function exibir() {
					$id = $this->uri->segment(2);
					if (empty($id)) {
						show_404();
					}

					$this->dadosView['{$modulo}'] = $this->{$model}->ache($id);

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
					$this->dadosView['historia'] = $this->{$model}->ache($id);
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

					if ($this->{$model}->atualiza($id, $dados)) {
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