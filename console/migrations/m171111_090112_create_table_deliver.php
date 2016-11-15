<?php

use yii\db\Migration;

class m171111_090112_create_table_deliver extends Migration
{
    const tableName = '{{%deliver}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'place' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'phone' => $this->string(),
            'contact_name' => $this->string(), //контактное лицо

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
