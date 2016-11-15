<?php

use yii\db\Migration;

class m171117_100139_create_table_static extends Migration
{
    const tableName = '{{%static}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'val' => $this->string()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
