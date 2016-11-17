<?php

use yii\db\Migration;

class m161113_090113_create_table_option extends Migration
{
    const tableName = '{{%option}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'cat_option_id' => $this->integer()->notNull(),
            'price' => $this->money()->notNull(), //дополнительная цена опции
            'icon' => $this->string(), //картинка опции
            'description' => $this->text()->notNull(),
            'stock' => $this->integer()->defaultValue(0), //остаток на складе

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('FK_OP_category', self::tableName, 'cat_option_id', '{{%option_category}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_OP_category', self::tableName);
        $this->dropTable(self::tableName);
    }
}
