<?php

use yii\db\Migration;

class m171115_100139_create_table_site_setting extends Migration
{
    const tableName = '{{%site_setting}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'value'=>$this->text()->notNull(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
