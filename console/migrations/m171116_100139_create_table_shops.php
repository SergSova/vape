<?php

use yii\db\Migration;

class m171116_100139_create_table_shops extends Migration
{
    const tableName = '{{%shops}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'phone' => $this->string(),
            'schedule' => $this->string(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
