<?php

use yii\db\Migration;

class m171118_100131_create_table_action extends Migration
{
    const tableName = '{{%action}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()->unique(),
            'description' => $this->text()->notNull(),
            'volume'=>$this->integer(),
            'icon'=>$this->string()->defaultValue(''),
            'status'=>'ENUM("active", "inactive", "blocked")',

            'created_at' => $this->integer()->notNull(),
            'updated_at' => $this->integer()->notNull(),
        ]);
    }

    public function down()
    {
        $this->dropTable(self::tableName);
    }
}
