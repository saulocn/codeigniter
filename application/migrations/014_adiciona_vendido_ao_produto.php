<?php 


class Migration_Adiciona_vendido_ao_produto extends CI_migration {

	public function up() {
		$this->load->dbforge();
		$this->dbforge->add_column('produtos', array(
			"vendido" => array(
				"type" => "boolean",
				"default" => "0"
			)

		));

    }


	public function down() {
        $this->dbforge->drop_column("produtos", "vendido");
    }

}

