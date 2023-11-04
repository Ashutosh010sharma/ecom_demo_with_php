<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateAndAddfieldToEmployeesTable extends Migration
{
    public function up()
    {
        $addfields = [
            'phone_no' => [
                  'type' => 'INT',
                  'constraint' => 15,
            ],

            'local_address' => [
                'type' => 'TEXT',
                
          ],
          'permanent_address' => [
            'type' => 'TEXT',
            
          ],
            
      ];
    $this->forge->addColumn('user_table', $addfields);
    }

    public function down()
    {
        $this->forge->dropColumn('user_table', ['phone_no']);
        $this->forge->dropColumn('user_table', ['local_address']);
        $this->forge->dropColumn('user_table', ['permanent_address']);
    }
}
