<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UpdateAndAddfieldToUserDetails extends Migration
{
    public function up()
    {
        $addfields = [
        'user_id' => [
            'type' => 'INT',
            'constraint' => 10,
      ],
    ];
      $this->forge->addColumn('user_details', $addfields);
    }

    public function down()
    {
        $this->forge->dropColumn('user_details', ['user_id']);
    }
}
