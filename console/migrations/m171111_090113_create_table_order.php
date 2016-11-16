<?php

use yii\db\Migration;

class m171111_090113_create_table_order extends Migration
{
    const tableName = '{{%order}}';

    public function up()
    {
        $this->createTable(self::tableName, [
            'id' => $this->primaryKey(),
            'status' => "ENUM('received', 'accepted', 'sent', 'canceled') DEFAULT 'received'", //статусы (получен, одобрен, отправлен, отменен)
            'deliver_id' => $this->integer()->notNull(), //доставка на
            'customer' => $this->integer(), //заказчик

            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
        ]);

        $this->addForeignKey('FK_O_deliver', self::tableName, 'deliver_id', '{{%deliver}}', 'id', 'CASCADE', 'CASCADE');
        $this->addForeignKey('FK_O_customer', self::tableName, 'customer', '{{%user}}', 'id', 'CASCADE', 'CASCADE');
    }

    public function down()
    {
        $this->dropForeignKey('FK_O_deliver',self::tableName);
        $this->dropForeignKey('FK_O_customer',self::tableName);
        $this->dropTable(self::tableName);
    }
}
