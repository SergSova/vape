<?php

use yii\db\Migration;

class m171115_100138_create_table_subscription extends Migration
{
    const tableName = '{{%subscription}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'email_to' => $this->string()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
