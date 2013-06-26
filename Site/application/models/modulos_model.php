<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o gerenciamento da tabela tb_modulos 
 * 
 * @author Eliel de Paula - <elieldepaula@gmail.com> 
 * @since 26/07/2012 
 * @version 0.0.1 
 * 
 */

class modulos_model extends CI_Model {

    private $tabela = 'tb_modulos';
    private $primary_key = 'cod_modulo';

    function __construct() {
        parent::__construct();
    }

    /**
     * Este método retorna uma lista com o menu de módulos disponíveis
     * e visíveis para ser usado no painel de controle.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return string
     */
    public function get_menu_admin() {
        $saida = '';
        $this->db->where('mod_visivel', 1);
        $this->db->order_by('mod_label', 'asc');
        $query = $this->db->get($this->tabela);
        foreach ($query->result() as $row):
            $saida .= '<li class="ui-menu-item ui-corner-all item">' . anchor($row->mod_link, $row->mod_label) . '</li>';
        endforeach;
        return $saida;
    }

    /**
     * Este método lista todos os resultados da tabela tb_modulos.
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
     * Este método faz a contagem de todos os registros da tabela tb_modulos.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function count_all() {
        return $this->db->count_all($this->tabela);
    }

    /**
     * Este método recupera uma consulta com paginação da tabela tb_modulos.
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
     * Este método recupera um registro da tabela tb_modulos.
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
     * Este método recupera o ID do módulo pesquisando pelo link.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    public function get_id_by_link($link) {
        $this->db->where('mod_link', $link);
        return $this->db->get($this->tabela);
    }

    /**
     * Este método salva um registro na tabela tb_modulos.
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
     * Este método atualiza um registro na tabela tb_modulos.
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
     * Este método exclui um registro da tabela tb_modulos.
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

