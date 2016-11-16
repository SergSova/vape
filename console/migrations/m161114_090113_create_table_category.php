<?php

use yii\db\Migration;

class m161114_090113_create_table_category extends Migration
{
    const tableName = '{{%category}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'icon' => $this->string(),
            'parent' => $this->integer(),

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('FK_C_parent', self::tableName, 'parent', self::tableName, 'id', 'SET NULL', 'CASCADE');
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
