<?php

use yii\db\Migration;

class m171117_100139_create_table_static_page extends Migration
{
    const tableName = '{{%static_page}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'val' => $this->string()->notNull(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
