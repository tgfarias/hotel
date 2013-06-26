<?php

if (!defined('BASEPATH'))
    exit('Acesso direto ao script negado.');

/**
 * Esta classe foi gerada automaticamente pelo sistema de geração 
 * de CMS para Codeigniter desenvolvido por Eliel de Paula. 
 * 
 * Esta classe fornece os atributos e métodos necessários para 
 * o gerenciamento da tabela tb_usuarios 
 * 
 * @author Eliel de Paula - <elieldepaula@gmail.com> 
 * @since 26/07/2012 
 * @version 0.0.1 
 * 
 */
class usuarios_model extends CI_Model {

    private $tabela = 'tb_usuarios';
    private $primary_key = 'cod_usuario';

    function __construct() {
        parent::__construct();
    }

    /**
     * Este método executa uma vefiricação de login para checar
     * se um usuário existe ou não na base de dados. O usuário 
     * também precisa estar ativo para fazer o logon.
     * 
     * @param string $user
     * @param string $pass
     * @return boolean 
     */
    public function check_login($user, $pass) {
        $this->db->where('usu_email', $user);
        $this->db->where('usu_senha', $pass);
        $this->db->where('usu_ativo', '1');
        $query = $this->db->get($this->tabela);
        if ($query->num_rows() > 0):
            $query = $query->row();
            return $query->cod_usuario;
        else:
            return false;
        endif;
    }

    /**
     * Este método verifica a existência de um email no cadastro de
     * usuários para a redefinição de senha.
     * 
     * @access public
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @param string $email
     * @return mixed
     */
    public function email_existe($email) {
        $this->db->where('usu_email', $email);
        return $this->db->get($this->tabela)->row();
    }

    /**
     * Este método lista todos os resultados da tabela tb_usuarios.
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
     * Este método faz a contagem de todos os registros da tabela tb_usuarios.
     * 
     * @access public 
     * @author Eliel de Paula <elieldepaula@gmail.com> 
     * @return boolean 
     */
    function count_all() {
        return $this->db->count_all($this->tabela);
    }

    /**
     * Este método recupera uma consulta com paginação da tabela tb_usuarios.
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
     * Este método recupera um registro da tabela tb_usuarios.
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
     * Este método salva um registro na tabela tb_usuarios.
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
     * Este método atualiza um registro na tabela tb_usuarios.
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
     * Este método exclui um registro da tabela tb_usuarios.
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

    /**
     * Este método retorna o relacionamento da tabela tb_usuarios.
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

