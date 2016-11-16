<?php

use yii\db\Migration;

class m161117_090113_create_table_option_product extends Migration
{
    const tableName = '{{%option_product}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'option_id' => $this->integer(), //relation to category table
            'product_id' => $this->integer(), //relation to product table

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('FK_OP_option', self::tableName, 'option_id', '{{%option}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_OP_product', self::tableName, 'product_id', '{{%product}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_OP_option', self::tableName);
        $this->dropForeignKey('FK_OP_product', self::tableName);
        $this->dropTable(self::tableName);
    }
}
