<?php

use yii\db\Migration;

class m171119_100132_create_table_cart extends Migration
{
    const tableName = '{{%cart}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'user_id' => $this->string()->notNull(),
            'product_id' => $this->integer(),
            'count' => $this->integer(),
            'option_id' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('FK_CART_product', self::tableName, 'product_id', '{{%product}}', 'id', 'SET NULL', 'CASCADE');
        $this->addForeignKey('FK_CART_option', self::tableName, 'option_id', '{{%option}}', 'id', 'SET NULL', 'CASCADE');

    }

    public function down()
    {
        $this->dropForeignKey('FK_CART_product', self::tableName);
        $this->dropForeignKey('FK_CART_option', self::tableName);
        $this->dropTable(self::tableName);
    }
}
