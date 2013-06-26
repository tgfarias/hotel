<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o gerenciamento da tabela tb_configuracoes 
 * 
 * @author Eliel de Paula - <elieldepaula@gmail.com> 
 * @since 01/08/2012 
 * @version 0.0.1 
 * 
 */
class configuracoes_model extends CI_Model {

    private $tabela = 'tb_configuracoes';
    private $primary_key = 'cod_config';

    function __construct() {
        parent::__construct();
    }

    /**
     * Este método recupera um valor de um registro da tabela tb_configuracoes
     * com base na chave passada como parametro.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return string 
     */
    public function get_by_chave($chave) {
        $this->db->where('conf_key', $chave);
        $query = $this->db->get($this->tabela)->row();
        return $query->conf_value;
    }

    /**
     * Este método lista todos os resultados da tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function list_all() {
        // Aqui pode-se fazer um filtro e passar os parametros pelo metodo.
        return $this->db->get($this->tabela);
    }

    /**
     * Este método faz a contagem de todos os registros da tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function count_all() {
        return $this->db->count_all($this->tabela);
    }

    /**
     * Este método recupera uma consulta com paginação da tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function get_paged_list($limit = 10, $offset = 0) {
        $this->db->order_by($this->primary_key, 'asc');
        return $this->db->get($this->tabela, $limit, $offset);
    }

    /**
     * Este método recupera um registro da tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function get_by_id($id) {
        $this->db->where($this->primary_key, $id);
        return $this->db->get($this->tabela);
    }

    /**
     * Este método salva um registro na tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function save($dados) {
        $this->db->insert($this->tabela, $dados);
        return $this->db->insert_id();
    }

    /**
     * Este método atualiza um registro na tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function update($id, $dados) {
        $this->db->where($this->primary_key, $id);
        $this->db->update($this->tabela, $dados);
        return $this->db->affected_rows();
    }

    /**
     * Este método exclui um registro da tabela tb_configuracoes.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function delete($id) {
        $this->db->where($this->primary_key, $id);
        $this->db->delete($this->tabela);
        return $this->db->affected_rows();
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

