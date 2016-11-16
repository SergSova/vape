<?php

use yii\db\Migration;

class m161115_090113_create_table_product extends Migration
{
    const tableName = '{{%product}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'icon' => $this->string(),  //основное фото
            'gallery' => $this->text(), //галерея до 5 фото
            'price' => $this->money()->notNull(),
            'description' => $this->text()->notNull(),
            'stock' => $this->integer(),  //остаток товара на складе

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
