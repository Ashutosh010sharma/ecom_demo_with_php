<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddUserTable extends Migration
{
    public function up()
    {
        //
        $this->forge->addField([
            "user_id"=>[
                'type'=>"INT",
                "constraint"=>5,
                "auto_increment"=>true,
                "unsigned"=>true
            ],
            "user_name"=>[
                'type'=>"VARCHAR",
                'constraint'=>100,

            ],
            "user_email"=>[
                'type'=>"VARCHAR",
                'constraint'=>100,
                
            ],
            "user_password"=>[
                'type'=>"VARCHAR",
                'constraint'=>100,
                
            ],
            "about"=>[
                'type'=>"TEXT",
              
                
            ],
            "added_date"=>[
                'type'=>"DATETIME",
              
                
            ],
            "user_type"=>[
                'type'=>"ENUM",
                'constraint'=>['user','admin'],
                'default'=>'user',

              
                
            ],
            "country"=>[
                'type'=>"VARCHAR",
                'constraint'=>100,

              
                
            ],
            
        ]);
       
        $this->forge->addKey('user_id',true);

        $this->forge->createTable("user_table");
       

    }

    public function down()
    {
        //
        $this->forge->dropTable('user_table');

    }
}
