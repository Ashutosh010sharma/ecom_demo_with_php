<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class UserDetails extends Migration
{
    public function up()
    {

        $this->forge->addField([
            'country'=>[
                'type'=>'VARCHAR',
                'constraint'=>100,
            ],
            'state' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
            ],
    
            'district' => [
              'type' => 'VARCHAR',
              'constraint' => 100,
            ],
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
          

           'pincode' => [
           'type' => 'VARCHAR',
           'constraint' => 10,
            ],
            
        ]);


        $this->forge->createTable("user_details");
        $this->forge->addForeignKey('user_id', 'user_table', 'id');
       
    }

    public function down()
    {
        //
    }
}
