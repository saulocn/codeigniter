<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Produtos extends CI_Controller {


	public function index() {
        $this->output->enable_profiler(FALSE);
		$this->load->model("produtos_model");
		$produtos = $this->produtos_model->buscaTodos();
		$dados = array("produtos" => $produtos);
		$this->load->helper(array("url", "currency"));
		//$this->load->view("cabecalho.php");
		$this->load->template("produtos/index.php", $dados);
		//$this->load->view("rodape.php");
	}

	public function formulario() {
		autoriza();
        $this->load->template("produtos/formulario");
    }

    public function novo(){
		$usuarioLogado = autoriza();
    	$this->load->library('form_validation');

    	$this->form_validation->set_rules("nome", "nome", "required|min_length[5]|max_length[100]|callback_nao_tenha_a_palavra_melhor");
    	$this->form_validation->set_rules("descricao", "descricao", "trim|required|min_length[10]");
    	$this->form_validation->set_rules("preco", "preco", "required");

    	$this->form_validation->set_error_delimiters("<p class='alert alert-danger'>", "</p>");


    	$sucesso = $this->form_validation->run();
    	if($sucesso){
			$produto = array(
				"nome" => $this->input->post("nome"),
				"preco" => $this->input->post("preco"),
				"descricao" => $this->input->post("descricao"),
				"usuario_id" => $usuarioLogado['id'],
			);
			$this->load->model("produtos_model");
			$this->produtos_model->salva($produto);
			$this->session->set_flashdata("success", "Produto salvo com suceso!");
			redirect("/");
		} else {
			$this->load->template("produtos/formulario");
		}
    }



	public function mostra($idProduto) {
		$this->load->model("produtos_model");
		$produto = $this->produtos_model->busca($idProduto);
		$dados = array("produto" => $produto);
		$this->load->helper(array("typography", "currency"));
		$this->load->template('produtos/mostra', $dados);
    }

     public function nao_tenha_a_palavra_melhor($nome) {
        $posicao = strpos($nome, "melhor");
        if($posicao != FALSE) {
            return TRUE;
        } else {
            $this->form_validation->set_message("nao_tenha_a_palavra_melhor", "O campo '%s' não pode conter a palavra 'melhor'");
            return FALSE;
        }

    }
}