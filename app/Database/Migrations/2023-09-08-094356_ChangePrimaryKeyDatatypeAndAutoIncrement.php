<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class ChangePrimaryKeyDatatypeAndAutoIncrement extends Migration
{
    public function up()
    {
        $fields = [
            'id' => [
                'type' => 'INT',
                'auto_increment' => true,
            ],
        ];

        $this->forge->modifyColumn('product_categories', $fields);
    }

    public function down()
    {
        //
    }
}
