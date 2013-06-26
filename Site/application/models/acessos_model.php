<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o gerenciamento da tabela tb_acessos 
 * 
 * @author Eliel de Paula - <elieldepaula@gmail.com> 
 * @since 26/07/2012 
 * @version 0.0.1 
 * 
 */
class acessos_model extends CI_Model {

    private $tabela = 'tb_acessos';
    private $primary_key = 'cod_acesso';

    function __construct() {
        parent::__construct();
    }

    /**
     * Este método lista todos os resultados da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function list_all($cod_usuario) {
        $this->db->where('cod_usuario', $cod_usuario);
        return $this->db->get($this->tabela);
    }

    /**
     * Este método faz a contagem de todos os registros da tabela tb_acessos.
     * 
     * Nota: Alterado do original para fazer a contagem somente dos registros
     * relacionados com a tabela de usuários.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function count_all($cod_usuario) {
        $query = $this->db->query('SELECT COUNT(cod_usuario) AS Total FROM tb_acessos WHERE cod_usuario = "' . $cod_usuario . '"')->row();
        return $query->Total;
    }

    /**
     * Este método recupera uma consulta com paginação da tabela tb_acessos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function get_paged_list($cod_usuario, $limit = 10, $offset = 0) {
        $this->db->where('cod_usuario', $cod_usuario);
        $this->db->order_by($this->primary_key, 'asc');
        return $this->db->get($this->tabela, $limit, $offset);
    }

    /**
     * Este método recupera um registro da tabela tb_acessos.
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
     * Este método salva um registro na tabela tb_acessos.
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
     * Este método atualiza um registro na tabela tb_acessos.
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
     * Este método exclui um registro da tabela tb_acessos.
     * 
     * Nota: Alterado do original para excluir somente os acessos
     * relacionados a um determinado usuário.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function delete($cod_usuario) {
        $this->db->where('cod_usuario', $cod_usuario);
        $this->db->delete($this->tabela);
        return $this->db->affected_rows();
    }

}

/* Sem fechamento para evitar erros de cabecalho. */

