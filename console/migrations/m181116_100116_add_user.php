<?php

use yii\db\Migration;

class m181116_100116_add_user extends Migration
{
    public function up()
    {
        $this->insert('{{%user}}', [
            'username' => 'sova',
            'email' => 'sergeysova@ukr.net',
            'password_hash' => '$2y$13$vzXxPWWU//GH8X2w7fvcL.G8ua0pnnfP.C2P7PioPjnjTCZMIdntW',
            'auth_key'=>0,
            'status' => 10,
            'created_at' => 111,
            'updated_at' => 222
        ]);
    }

    public function down()
    {

    }


}
