
<h1><?= $produto['nome'] ?></h1>
Preço: <?= numeroEmReais($produto['preco']) ?> <br />
<?= auto_typography(html_escape($produto['descricao'])) ?> <br />

<h2>Compre agora mesmo!</h2>
<?php 
echo form_open("vendas/nova");
echo form_hidden("produto_id", $produto['id']);


echo form_label("Data de Entrega", "data_de_entrega");


echo form_input(array(
	"name" => "data_de_entrega",
	"id" => "data_de_entrega",
	"maxlength" => "255",
	"class" => "form-control",
	"value" => set_value("data_de_entrega", "")
));
echo form_error("data_de_entrega");

echo form_button(array(
	"class" => "btn btn-primary",
	"content" => "Comprar",
	"type" => "Submit"
));

echo form_close();


?>