<?php

class Migration_Create_invitations extends CI_Migration {

	public function up()
	{
		$this->dbforge->add_field(array(
			'id' => array(
				'type' => 'INT',
				'constraint' => 11,
				'unsigned' => TRUE,
				'auto_increment' => TRUE
			),
			'name' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
			'surname' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                        'media' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                                'country' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                    
                        'email' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                    
                        'vip' => array(
				'type' => 'VARCHAR',
				'constraint' => '100',
			),
                    
                        'attend' => array(
				'type' => 'VARCHAR',
				'constraint' => '250',
			),
                    
                        'date_tour' => array(
				'type' => 'datetime',
				
			),
                       'date_interview' => array(
				'type' => 'datetime',
				
			),
                      'interview_with' => array(
				'type' => 'VARCHAR',
				'constraint' => '250',
			),
                         'reg_date' => array(
				'type' => 'datetime',
				
			),
                         'user_id' => array(
				'type' => 'INT',
				'constraint' => '10',
			),
		));
                
                $this->dbforge->add_key('id', TRUE);
		$this->dbforge->create_table('invitations');
	}

	public function down()
	{
		$this->dbforge->drop_table('invitations');
	}
}
