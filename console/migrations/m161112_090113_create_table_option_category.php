<?php

use yii\db\Migration;

class m161112_090113_create_table_option_category extends Migration
{
    const tableName = '{{%option_category}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
