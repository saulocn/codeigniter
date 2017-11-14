<?php
class Produtos_model extends CI_Model {

	public function buscaTodos() {
        $this->db->where("vendido", false);
        return $this->db->get("produtos")->result_array();
    }

    public function salva($produto){
		$this->db->insert("produtos", $produto);
    }

    public function busca($idProduto) {
        return $this->db->get_where("produtos", array(
            "id"=>$idProduto
        ))->row_array();
    }

    public function buscaVendidos($usuario) {
        $idUsuario = $usuario["id"];
        $this->db->select("produtos.*, vendas.data_de_entrega");
        $this->db->from("produtos");
        $this->db->join("vendas", "vendas.produto_id = produtos.id");
        $this->db->where("usuario_id", $idUsuario);
        $this->db->where("vendido", true);
        return $this->db->get()->result_array();
    }
}