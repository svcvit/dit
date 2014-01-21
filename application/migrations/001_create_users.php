<?php

class Migration_Create_users extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'password' => array(
				'type' => 'VARCHAR',
				'constraint' => '128',
			),
                        'country' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                        'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                       'activated' => array(
				'type' => 'INT',
				'constraint' => '1',
			),
                      'user_type' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                    
		));
                
                $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('users');
	}

	public function down()
	{
		$this->dbforge->drop_table('users');
	}
}
