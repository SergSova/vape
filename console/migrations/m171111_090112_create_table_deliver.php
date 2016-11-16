<?php

use yii\db\Migration;

class m171111_090112_create_table_deliver extends Migration
{
    const tableName = '{{%deliver}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'place' => $this->string()->notNull(),
            'address' => $this->string()->notNull(),
            'country' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'phone' => $this->string(),
            'contact_name' => $this->string(), //контактное лицо
            'user_id' => $this->integer(), //связь с пользователем

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);
        $this->addForeignKey('FK_D_user', self::tableName, 'user_id', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_D_user', self::tableName);
        $this->dropTable(self::tableName);
    }
}
