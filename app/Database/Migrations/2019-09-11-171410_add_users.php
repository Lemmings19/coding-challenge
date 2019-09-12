<?php namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUsers extends Migration
{
	public function up()
	{
		$this->forge->addField([
            'id'  => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
                'auto_increment' => TRUE,
            ],
            'name' => [
                'type'           => 'VARCHAR',
                'constraint'     => '100',
            ],
            'session_id' => [
                'type'           => 'INT',
                'constraint'     => 5,
                'unsigned'       => TRUE,
            ],
        ]);
        $this->forge->addKey('id', TRUE);
        $this->forge->createTable('users');
	}

	//--------------------------------------------------------------------

	public function down()
	{
		$this->forge->dropTable('users');
	}
}
