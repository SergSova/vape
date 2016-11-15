<?php

use yii\db\Migration;

class m161117_090113_create_table_option_product extends Migration
{
    const tableName = '{{%option_product}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(), //relation to category table
            'product_id' => $this->integer(), //relation to product table

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey('FK_OP_category', self::tableName, 'category_id', '{{%category}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_OP_product', self::tableName, 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_OP_category', self::tableName);
        $this->dropForeignKey('FK_OP_product', self::tableName);
        $this->dropTable(self::tableName);
    }
}
