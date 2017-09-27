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
     * @var String
     */
    protected $table;

    /**
     * Instancia do banco de dados que esta sendo utilizado no model.
     * Deve ser setado no construtor.
     * @var object
     */
    protected $_database;
    /**
     * Identificadores unicos da tabela. Utiliza por padrao 'id'.
     * Deve ser setado no construtor.
     * Utilizada em metodos de selecao, atualizacao e exclusao.
     * @var String
     * @todo verificar como ficaria como um array (para casos de multiplas chaves)
     */
    protected $pk = 'id';

    /**
     * Identificador unico da tabela. Utiliza por padrao 'id'.
     * Deve ser setado no construtor.
     * Utilizada em metodos de selecao.
     * @var array
     */
    protected $fks = array();

    /**
     * Ativa ou desativa o uso de relacionamentos nas consultas.
     * @var bool
     */
    protected $relacionar = true;

    /**
     * Relacionamentos um para um com outra tabela.
     * Nesta tabela pode existir zero ou uma tupla que relacia-a a outra tabela.
     * @var array
     */
    protected $temUm = array();

    /**
     * Relacionamentos um para muitos com outra tabela.
     * Em outra tabela pode existir zero ou mais tupla que relacioanam-se com esta tabela atraves de uma chave estrangeira.
     * @var array
     */
    protected $temMuitos = array();

    /**
     * Relacionamentos muitos para muitos com outra tabela.
     * Existe uma tabela intermediaria na qual pode existir zero ou mais tupla que relacioanam esta a outra tabela.
     * Elas nao possuem chaves extrangeiras, pois estas chaves encontram-se na tabela intermediaria.
     * formato de nome de tabela intermediaria: tabela1_tabela2. Use a ordem alfabetica.
     * @var array
     */
    protected $muitosParaMuitos = array();

    /**
     * Ativa o debug do banco (impresao das consultas realizadas).
     * @var bool
     */
    private $debug = false;

    public function __construct() {
        parent::__construct();
        $this->_database = $this->db;
    }

    public function getPk() {
        return $this->pk;
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
     * RELACIONAMENTOS
     * ------------------------------------------------------------ */
    public function utilizarRelacionamentos($bool) {
        $this->relacionar = $bool;
    }

    public function relacionamentos($dados) {
        if(!$this->relacionar || empty($dados)) {
            return $dados;
        }

        /* 
            O atributo {temum} eh um array simples de strings, onde cada elemento do array eh uma tabela do relacionamento.
            Seguindo o padrao de criacao dos models nomedatabelanosingula_model e dachave estrangeira nomedatabelanosingula_id
            criamos a consulta dinamicamente e guardamos seu valor no atributo com o nome da tabela.
        */
        foreach ($this->temUm as $relacionamento) {
            if (!is_string($relacionamento)) {continue;}

            $model = $relacionamento.'_model';
            $this->load->model($model);
            $fk = $relacionamento.'_id';

            foreach ($dados as $key => $tupla) {
                $retorno = $this->{$model}->achePor($this->{$model}->getPk()." = '".$tupla->{$fk}."'");
                $this->imprimeDebug();
   
                if (is_object($tupla)) {
                    $dados[$key]->{$relacionamento} = $retorno[0];
                } else {
                    $dados[$key][$relacionamento] = $retorno[0];
                }
            }
        }

        // tem muitos esta ok
        foreach ($this->temMuitos as $key => $value) {
            if (!is_string($value)) {continue;}

            $model = $value.'_model';
            $this->load->model($model);

            foreach ($dados as $key => $tupla) {
                // buscando todas as tuplas onde a chave estrangeira nome_desta_tabela_id possua valor igual a $dado(objeto atual da iteracao).
                $retorno = $this->{$model}->achePor("{$this->table}_id = '{$tupla[$this->pk]}'");
                $this->imprimeDebug();

                if (is_object($tupla)) {
                    $dados[$key]->{$value} = $retorno;
                } else {
                    $dados[$key][$value] = $retorno;
                }
            }
        }

        // muitos para muitos esta ok
        foreach ($this->muitosParaMuitos as $key => $dadosTabelas) {
            $tabelaFk = $dadosTabelas['tabelaFk'];
            $tabelaIntermediaria = $dadosTabelas['tabelaIntermediaria'];
            if (!is_string($tabelaFk) || !is_string($tabelaIntermediaria)) {continue;}

            // carregando o model da chave estrangeira
            $model = $tabelaFk.'_model';
            $this->load->model($model);
            $fk = $this->{$model}->fks;

            foreach ($dados as $key => $tupla) {
                // buscando todas as tuplas onde a chave primaria das duas tabelas estejam relacionadas na tabela intermediaria.
                $retorno = $this->{$model}->_database->query("
                    SELECT * FROM {$tabelaFk}
                    inner join {$tabelaIntermediaria} 
                        on {$tabelaFk}.id = {$tabelaIntermediaria}.{$tabelaFk}_id
                        and {$this->table}.id = {$tabelaIntermediaria}.{$this->table}_id
                ");
                $this->imprimeDebug();

                if (is_object($tupla)) {
                    $dados[$key]->{$tabelaFk} = $retorno;
                } else {
                    $dados[$key][$tabelaFk] = $retorno;
                }
            }
        }
        return $dados;
    }

    /* --------------------------------------------------------------
     * METODOS CRUD
     * ------------------------------------------------------------ */
    /**
     * retorna uma unica tupla baseada na chave primaria.
     * @param mixed $pk
     * @return array
     */
    public function ache($pk) {
        $sql = $this->achePor("{$this->pk} = {$pk}");
        return $this->relacionamentos($sql);
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
        $sql = $row->result();
        return $this->relacionamentos($sql);
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
    public function deletar_por($where) {

        $this->criaCondicoes($where);
        $result = $this->_database->delete($this->table);
        $this->imprimeDebug();
        return $result;
    }

    /**
     * Deleta variastuplas baseando-se nas chaves primarias.
     * @param array $pks - array de id's.
     */
    public function deletar_varios($pks) {

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

    /**
     * Data de criacao para ser adicionado em inserts
     */
    public function created_at($tupla) {
        if (is_object($tupla)) {
            $tupla->created_at = date('Y-m-d H:i:s');
        } else {
            $tupla['created_at'] = date('Y-m-d H:i:s');
        }

        return $tupla;
    }

    /**
     * Data de atualizacao para ser adicionado em updates
     */
    public function updated_at($tupla) {
        if (is_object($tupla)) {
            $tupla->updated_at = date('Y-m-d H:i:s');
        } else {
            $tupla['updated_at'] = date('Y-m-d H:i:s');
        }

        return $tupla;
    }

    /**
     * Cria as condicoes para a query.
     * @param mixed(string|array) $params - pode ser uma strig ou um array chave-valor
     */
    protected function criaCondicoes($params) {
        if (is_string($params)) {
            $this->_database->where($params);
            return;
        }

        if (!is_array($params)) {
            return;
        }

        foreach ($params as $campo => $valor) {
            if (is_int($campo)) { continue;}
            if (is_array($valor)) {
                $this->_database->where_in($campo, $valor);
            } else {
                $this->_database->where($campo, $valor);
            }
        }
    }
}