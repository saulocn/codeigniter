<h1>Produtos</h1>
<table class="table">
<?php
	foreach ($produtos as $produto) {
		?>
		<tr>
			<td>
				<?=anchor("produtos/{$produto['id']}",$produto['nome'])?>		
			</td>
			<td><?=character_limiter(html_escape($produto['descricao'], 10))?></td>
			<td><?=numeroEmReais($produto['preco'])?></td>
		</tr>

		<?php
		
	}

?>
</table>
<?php if($this->session->userdata("usuario_logado")) : ?>
	<?= anchor('login/logout', 'Logout', array("class" => "btn btn-primary")) ?>
	<?= anchor('produtos/formulario','Novo produto', array("class" => "btn btn-primary"))?>
<?php else : ?>
	<h1>Login</h1>
	<?php 

	echo form_open("login/autenticar");
	echo form_label("E-Mail", "email");

	echo form_input(array(
		"name" => "email",
		"id" => "email",
		"maxlength" => "255",
		"class" => "form-control",
	));

	echo form_label("Senha", "senha");

	echo form_password(array(
		"name" => "senha",
		"id" => "senha",
		"maxlength" => "255",
		"class" => "form-control",
	));


	echo form_button(array(
		"class" => "btn btn-primary",
		"content" => "Login",
		"type" => "Submit"
	));

	echo form_close();
	 ?>

<?php endif ?>


<h1>Cadastro</h1>

<?php 
echo form_open("usuarios/novo");
echo form_label("Nome", "nome");
echo form_input(array(
	"name" => "nome",
	"id" => "nome",
	"maxlength" => "255",
	"class" => "form-control",
));

echo form_label("E-Mail", "email");

echo form_input(array(
	"name" => "email",
	"id" => "email",
	"maxlength" => "255",
	"class" => "form-control",
));

echo form_label("Senha", "senha");

echo form_password(array(
	"name" => "senha",
	"id" => "senha",
	"maxlength" => "255",
	"class" => "form-control",
));

echo form_button(array(
	"class" => "btn btn-primary",
	"content" => "Cadastrar",
	"type" => "Submit"
));

echo form_close();
 ?>

