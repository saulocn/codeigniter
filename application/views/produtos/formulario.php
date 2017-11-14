<h1>Cadastro de Novo Produto</h1>

<?php //= validation_errors("<p class='alert alert-danger'>", "</p>")  ?>
	<?php 
	echo form_open("produtos/novo");


	echo form_label("Nome", "nome");


	echo form_input(array(
		"name" => "nome",
		"id" => "nome",
		"maxlength" => "255",
		"class" => "form-control",
		"value" => set_value("nome", "")
	));
	echo form_error("nome");



	echo form_label("Preço", "preco");


	echo form_input(array(
		"name" => "preco",
		"id" => "preco",
		"maxlength" => "255",
		"class" => "form-control",
		"type" => "number",
		"value" => set_value("preco", "")
	));
	echo form_error("preco");

	echo form_textarea(array(
		"name" => "descricao",
		"id" => "descricao",
		"maxlength" => "255",
		"class" => "form-control",
		"type" => "number",
		"value" => set_value("descricao", "")
	));
	echo form_error("descricao");

	echo form_button(array(
		"class" => "btn btn-primary",
		"content" => "Cadastrar",
		"type" => "Submit"
	));

	echo form_close();



	?>