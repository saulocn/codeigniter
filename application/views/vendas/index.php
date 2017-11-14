<h1>Produtos Vendidos</h1>
<table class="table">
<?php
	foreach ($produtosVendidos as $produto) {
		?>
		<tr>
			<td>
				<?=anchor("produtos/{$produto['id']}",$produto['nome'])?>		
			</td>
			<td><?= dataMysqlParaPtBr($produto["data_de_entrega"]) ?></td>
			<td><?=numeroEmReais($produto['preco'])?></td>
		</tr>

		<?php
		
	}

?>
</table>