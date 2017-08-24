<?php
/**
 * Modelo base com funcoes CRUD 
 * https://github.com/waifung0207/ci_bootstrap_3
 *
 * CONVENÇÕES PARA MODELS
 * NOME DE MODELS DEVEM SER NO SINGULAR
 *
 * CONVENÇÕES PARA TABELAS
 * NOME DE TABELAS DEVEM SER NO SINGULAR
 * TODA TABELA DEVE POSSUIR UM CAMPO created_at e updated_at do tipo datetime
 * TODA TABELA DEVE POSSUIR UM CAMPO chave primaria autoincremento
 */
class MY_Model extends CI_Model {
    /* --------------------------------------------------------------
     * VARIABLES
     * ------------------------------------------------------------ */
    /**
     * nome da tabela no banco de dados.
     * Deve ser setado no construtor.
     */
    protected $table;

    /**
     * Instancia do banco de dados que esta sendo utilizado no model.
     * Deve ser setado no construtor.
     */
    protected $_database;
    /**
     * Identificador unico da tabela. Utiliza por padrao 'id'.
     * Deve ser setado no construtor.
     * Utilizada em metodos de selecao, atualizacao e exclusao.
     */
    protected $pk = 'id';

    /**
     * Relacionamentos com outras tabelas.
     * Deverao ser setados no construtor.
     * @todo pensar como pode ser implementado 
     */
    protected $pertence_a = array();
    protected $tem_muitos = array();
    private $debug = false;
    //protected $has_one = array();
    //protected $many_to_many = array();

    public function __construct() {
        parent::__construct();
        $this->_database = $this->db;
    }

    public function debugar($debug) {
        $this->debug = $debug;
    }

    protected function imprimeDebug() {
        if (!$this->debug) {
            return;
        }

        echo '<br><pre>';
        echo $this->_database->last_query();
        echo '</pre><hr>';
    }

    public function alteraBanco($db) {
        if (!$db) { return;}
        $this->_database = $db;
    }
    /* --------------------------------------------------------------
     * CRUD INTERFACE
     * ------------------------------------------------------------ */
    /**
     * retorna uma unica tupla baseada na chave primaria.
     */
    public function ache($pk) {
        return $this->achePor("{$this->pk} = {$pk}");
    }

    /**
     * retorna uma unica tupla baseada em um ou mais campos da tabela.
     */
    public function achePor($where) {
        $this->criaCondicoes($where);
        $row = $this->_database->get($this->table);
        $this->imprimeDebug();
        return $row->result();
    }

    /**
     * retorna varias tuplas baseando-se em um array de chaves primarias.
     */
    public function acheVarios($pks) {
        $this->_database->where_in($this->pk, $pks);
        return $this->pegueTodos();
    }

    /**
     * retorna varias tuplas baseando-se em um array de campos da tabela.
     */
    public function acheVariosPor($where) {
        $this->criaCondicoes($where);
        return $this->pegueTodos();
    }

    /**
     * retorna todas as tuplas da tabela.
     */
    public function pegueTodos() {
        $row = $this->_database->get($this->table);
        $this->imprimeDebug();
        return $row->result();
    }

    /**
     * Insere uma nova tupla em uma tabela.
     * @param array $data - array chave-valor [nome do campo|valor a ser inserido].
     * @return int
     */
    public function inserir($data) {

        if ($data === FALSE) {
            return FALSE;
        }

        $data = $this->created_at($data);

        $this->_database->insert($this->table, $data);
        $insert_id = $this->_database->insert_id();
        $this->imprimeDebug();
        return $insert_id;
    }

    /**
     * Insere multiplas tuplas em uma tabela.
     * @param array $data - array com arrays chave-valor [nome do campo|valor a ser inserido].
     * @return array - com multiplos id's
     */
    public function inserirVarios($data) {
        $ids = array();
        foreach ($data as $key => $row) {
            $ids[] = $this->inserir($row);
        }
        return $ids;
    }

    /**
     * Atualiza um registro baseado na sua chave primaria.
     * @param int $pk - id da tabela[chave primaria].
     * @param array $data - array chave-valor [nome do campo|valor a ser inserido].
     * @return bool
     */
    public function atualiza($pk, $data){

        if ($data === FALSE) {
            return FALSE;
        }

        $data = $this->updated_at($data);

        $result = $this->_database->where($this->pk, $pk)
                           ->set($data)
                           ->update($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Atualiza varios registros baseado nas suas chaves primarias.
     * @param array $pks - array de ids da tabela[chave primaria].
     * @param array $data - array chave-valor [nome do campo|valor a ser inserido].
     * @return bool
     */
    public function atualizaVarios($pks, $data) {

        if ($data === FALSE) {
            return FALSE;
        }
        $result = $this->_database->where_in($this->pk, $pks)
                           ->set($data)
                           ->update($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Updated a record based on an arbitrary WHERE clause.
     * @param mixed $condicoes - condicoes para serem utilizadas no where.
     * @param array $data - array chave-valor [nome do campo|valor a ser inserido].
     */
    public function atualizaPor($condicoes,$data) {

        $this->criaCondicoes($condicoes);
        $result = $this->_database->set($data)->update($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * atualiza todas as tuplas da tabela.
     * @param array $data - array chave-valor [nome do campo|valor a ser inserido].
     */
    public function atualizaTodos($data) {

        $result = $this->_database->set($data)->update($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Deleta uma tupla da tabela baseado na chave primaria.
     * @param int $id - valor da chave primaria.
     */
    public function deletar($id) {

        $this->_database->where($this->pk, $id);
        $result = $this->_database->delete($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Deleta uma tupla da tabela utilizando uma clausa arbitraria
     * @param mixed $condicoes - condicoes para serem utilizadas no where.
     */
    public function delete_by($where) {

        $this->criaCondicoes($where);
        $result = $this->_database->delete($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Deleta variastuplas baseando-se nas chaves primarias.
     * @param array $pks - array de id's.
     */
    public function delete_many($pks) {

        $this->_database->where_in($this->pk, $pks);
        $result = $this->_database->delete($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Trunca a tabela
     */
    public function truncate() {
        $result = $this->_database->truncate($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /* --------------------------------------------------------------
     * RELATIONSHIPS
     * ------------------------------------------------------------ */

    public function relacionamentos($row) {
		if (empty($row)) {
		    return $row;
        }

        foreach ($this->pertence_a as $key => $value) {
            if (!is_string($value)) {
                continue;
            }
            $options = array( 'primary_key' => $value . '_id', 'model' => $value . '_model' );

            $this->load->model($options['model'], $value . '_model');
            if (is_object($row)) {
                $row->{$value} = $this->{$value . '_model'}->ache($row->{$options['primary_key']});
            } else {
                $row[$value] = $this->{$value . '_model'}->ache($row[$options['primary_key']]);
            }
        }

        foreach ($this->tem_muitos as $key => $value) {
            if (!is_string($value)) {
                continue;
            }
                $options = array( 'primary_key' => singular($this->table) . '_id', 'model' => singular($value) . '_model' );

            $this->load->model($options['model'], $value . '_model');
            if (is_object($row)) {
                $row->{$value} = $this->{$value . '_model'}->acheVariosPor($options['primary_key'], $row->{$this->primary_key});
            } else {
                $row[$value] = $this->{$value . '_model'}->acheVariosPor($options['primary_key'], $row[$this->primary_key]);
            }
        }

        return $row;
    }

    /* --------------------------------------------------------------
     * METODOS UTILITARIOS
     * ------------------------------------------------------------ */

    /**
     * retorna um count baseado em uma condicao arbitraria.
     */
    public function contarPor($where) {

        $this->criaCondicoes($where);
        $qtd = $this->_database->count_all_results($this->table);
        $this->imprimeDebug();
        return $qtd;
    }

    /**
     * Retorna um count de todas as linhas da tabela.
     */
    public function contaTodos() {
        $qtd = $this->_database->count_all($this->table);
        $this->imprimeDebug();
        return $qtd;
    }

    /**
     * Retorna o proximo valor de um campo auto increment de uma tabela. Testado apenas no MySQL.
     */
    public function proximoId() {
        return (int) $this->_database->select('AUTO_INCREMENT')
            ->from('information_schema.TABLES')
            ->where('TABLE_NAME', $this->table)
            ->where('TABLE_SCHEMA', $this->_database->database)->get()->row()->AUTO_INCREMENT;
    }

    /**
     * Retorna o nome da tabela
     */
    public function nomeTabela() {
        return $this->table;
    }

    /* --------------------------------------------------------------
     * OBSERVERS
     * ------------------------------------------------------------ */
    /**
     * MySQL DATETIME created_at and updated_at
     */
    public function created_at($row) {
        if (is_object($row)) {
            $row->created_at = date('Y-m-d H:i:s');
        } else {
            $row['created_at'] = date('Y-m-d H:i:s');
        }

        return $row;
    }

    public function updated_at($row) {
        if (is_object($row)) {
            $row->updated_at = date('Y-m-d H:i:s');
        } else {
            $row['updated_at'] = date('Y-m-d H:i:s');
        }

        return $row;
    }

    /**
     * Cria as condicoes para a query.
     */
    protected function criaCondicoes($params) {
        if (is_string($params)) {
            $this->_database->where($params);
            return;
        }

        if (!is_array($params)) {
            return;
        }

        $quantidadeParametros = count($params);
        switch ($quantidadeParametros) {
            case 1:
                if (!is_array($params[0])) {
                    $this->_database->where($params[0]);
                } else {
                    foreach ($params[0] as $field => $filter) {
                        if (is_array($filter)) {
                            $this->_database->where_in($field, $filter);
                        } else {
                            if (is_int($field)) {
                                $this->_database->where($filter);
                            } else {
                                $this->_database->where($field, $filter);
                            }
                        }
                    }        
                }
                break;
            case 2:
                if (is_array($params[1])) {
                    $this->_database->where_in($params[0], $params[1]);    
                } else {
                    $this->_database->where($params[0], $params[1]);
                }
                break;
            case 3:
                $this->_database->where($params[0], $params[1], $params[2]);
                break;
            default:
                if (is_array($params[1])) {
                    $this->_database->where_in($params[0], $params[1]);    
                } else {
                    $this->_database->where($params[0], $params[1]);
                }
                break;
        }
    }
}