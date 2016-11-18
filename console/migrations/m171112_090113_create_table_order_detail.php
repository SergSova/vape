<?php

use yii\db\Migration;

class m171112_090113_create_table_order_detail extends Migration
{
    const tableName = '{{%order_detail}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->notNull(),
            'product_id' => $this->integer()->notNull(),
            'old_price' => $this->money()->notNull(),
            'count' => $this->integer()->notNull(),
            'options' => $this->string(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('FK_OD_order', self::tableName, 'order_id', '{{%order}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_OD_product', self::tableName, 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_OD_order', self::tableName);
        $this->dropForeignKey('FK_OD_product', self::tableName);
        $this->dropTable(self::tableName);
    }
}
