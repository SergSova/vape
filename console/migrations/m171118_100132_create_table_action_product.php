<?php

use yii\db\Migration;

class m171118_100132_create_table_action_product extends Migration
{
    const tableName = '{{%action_product}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->notNull(),
            'action_id' => $this->integer()->notNull(),

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_AP_product', self::tableName, 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_AP_action', self::tableName, 'action_id', '{{%action}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_AP_product', self::tableName);
        $this->dropForeignKey('FK_AP_action', self::tableName);
        $this->dropTable(self::tableName);
    }
}
