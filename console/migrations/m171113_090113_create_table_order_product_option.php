<?php

use yii\db\Migration;

class m171113_090113_create_table_order_product_option extends Migration
{
    const tableName = '{{%order_product_option}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'order_detail_id' => $this->integer()->notNull(),
            'option_id' => $this->integer()->notNull(),
            'old_price' => $this->money()->notNull(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('FK_OPO_order_detail', self::tableName, 'order_detail_id', '{{%order_detail}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_OPO_option', self::tableName, 'option_id', '{{%option}}', 'id', 'CASCADE', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('FK_OPO_order_detail', self::tableName);
        $this->dropForeignKey('FK_OPO_option', self::tableName);
        $this->dropTable(self::tableName);
    }
}
