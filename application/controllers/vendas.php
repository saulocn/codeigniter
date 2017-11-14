<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');



class Vendas extends CI_Controller {

	public function nova(){
		$usuario = autoriza();
		$this->load->model(array("vendas_model","produtos_model","usuarios_model"));
		$venda = array(
			"produto_id" => $this->input->post("produto_id"),
			"comprador_id" =>$usuario["id"],
			"data_de_entrega" => dataPtBrParaMysql($this->input->post("data_de_entrega"))
		);

		$this->vendas_model->salva($venda);

		$this->load->library("email");

		$config['smtp_user'] = "mailuser";
		$config['smtp_pass'] = "pass";


		$config['protocol'] = "smtp";
		$config['smtp_host'] = "ssl://smtp.gmail.com";
		$config['smtp_port'] = "465";
		$config['charset'] = "utf-8";
		$config['mailtype'] = "html";
		$config['newline'] = "\r\n";

		$this->email->initialize();

		$produto = $this->produtos_model->busca($venda["produto_id"]); 
		$usuario = $this->usuarios_model->busca($produto['usuario_id']); 


		$this->email->from("mailuser", "Sistema X");
		$this->email->to(array("mailuser"));
		$this->email->subject("Seu produto {$produto['nome']} foi vendido!");

		$dados = array(
			"produto"=> $produto,
			"usuario" => $usuario
		);
		$conteudo = $this->load->view("vendas/email.php", $dados, TRUE);
		$this->email->message($conteudo);
		//$this->email->message("Atenção, {$usuario['nome']}, do e-mail {$usuario['email']}. \nSeu produto <b>{$produto['nome']}</b> foi vendido!");

		








		$this->session->set_flashdata("success", "Pedido de compra do produto {$produto['nome']} efetuado com sucesso!");
		redirect("/");
	}


	public function index(){
		$usuario = autoriza();
		$this->load->model("produtos_model");

		$produtosVendidos = $this->produtos_model->buscaVendidos($usuario);

		$dados = array(
			"produtosVendidos" => $produtosVendidos
		);
		$this->load->helper(array("currency"));

		$this->load->template("vendas/index", $dados);
	}


}
