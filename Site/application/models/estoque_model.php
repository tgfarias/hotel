<?php 

if ( ! defined('BASEPATH')) exit('Acesso direto ao script negado.'); 

/** 
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o gerenciamento da tabela estoque 
 * 
 * @package CMS 
 * @author Gerado automaticamente - <contato@elieldepaula.com.br> 
 * @since 28/03/2013 
 * @version 0.0.1 
 * 
 */

class estoque_model extends CI_Model { 

    private $tabela = 'estoque';
    private $primary_key = 'cod_estoque';

    function __construct() {
        parent::__construct();
    }

    /**
     * Este método lista todos os resultados da tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function list_all() {
        // Aqui pode-se fazer um filtro e passar os parametros pelo metodo.
        return $this->db->get($this->tabela);
    }

    /**
     * Este método faz a contagem de todos os registros da tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function count_all() {
        return $this->db->count_all($this->tabela);
    }

    /**
     * Este método recupera uma consulta com paginação da tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function get_paged_list($limit = 10, $offset = 0){
        $this->db->order_by($this->primary_key,'asc');
        return $this->db->get($this->tabela, $limit, $offset);
    }

    /**
     * Este método recupera um registro da tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function get_by_id($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->tabela);
    }

    /**
     * Este método salva um registro na tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    function save($dados){
        $this->db->insert($this->tabela, $dados);
        return $this->db->insert_id();
    }

    /**
     * Este método atualiza um registro na tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function update($id, $dados){
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->tabela, $dados);
         return $this->db->affected_rows();
    }

    /**
     * Este método exclui um registro da tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function delete($id){
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->tabela);
         return $this->db->affected_rows();
    }

    /**
     * Este método retorna o relacionamento da tabela estoque.
     * 
     * @access public 
     * @author Gerado automaticamente <contato@elieldepaula.com.br> 
     * @return boolean 
     */
    public function relacionamento($chave = '', $valor = ''){
        if($valor)$this->db->where($chave, $valor);
        return $this->db->get($this->tabela);
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

