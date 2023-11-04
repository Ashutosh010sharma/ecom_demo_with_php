<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddForeignKeyToTable extends Migration
{
    public function up()
    {
        $this->forge->addForeignKey('user_details', 'user_table', 'pincode', 'user_id');
    }

    public function down()
    {
        //
    }
}
