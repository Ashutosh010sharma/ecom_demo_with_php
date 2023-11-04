<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateAndAddfieldToEmployeesTable extends Migration
{
    public function up()
    {
        $addfields = [
            'state' => [
                  'type' => 'VARCHAR',
                  'constraint' => 100,
            ],

            'district' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
          ],

          'pincode' => [
            'type' => 'VARCHAR',
            'constraint' => 10,
      ],
       ];
       $this->forge->addColumn('user_table', $addfields);
    }

    public function down()
    {
        $this->forge->dropColumn('user_table', ['state']);
        $this->forge->dropColumn('user_table', ['district']);
        $this->forge->dropColumn('user_table', ['pincode']);
        
    }
}
