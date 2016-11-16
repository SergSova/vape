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
            'price' => $this->money()->notNull(), //дополнительная цена опции
            'icon' => $this->string(), //картинка опции
            'description' => $this->text()->notNull(),
            'stock' => $this->integer(), //остаток на складе

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
