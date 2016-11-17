<?php

use yii\db\Migration;

class m181116_100116_add_test_data extends Migration
{
    public function up()
    {
        $this->insert('{{%user}}', [
            'username' => 'sova',
            'email' => 'sergeysova@ukr.net',
            'password_hash' => '$2y$13$vzXxPWWU//GH8X2w7fvcL.G8ua0pnnfP.C2P7PioPjnjTCZMIdntW',
            'auth_key' => 0,
            'status' => 10,
            'created_at' => 111,
            'updated_at' => 222
        ]);

        $this->batchInsert('{{%category}}', ['name', 'icon', 'parent', 'created_at', 'updated_at'], [
            ['cat1', '["category/2016-11-17/1479383291582d98fb9d3150.95360481.png"]', NULL, 1479383295, 1479383295],
            ['cat2', '["category/2016-11-17/1479383304582d99082735c7.62844854.png"]', 1, 1479383305, 1479383305]
        ]);

        $this->batchInsert('{{%option_category}}', ['name'], [['вкус'], ['цвет']]);
        $this->batchInsert('{{%option}}', [
            'name',
            'cat_option_id',
            'price',
            'icon',
            'description',
            'stock',
            'created_at',
            'updated_at'
        ], [
            [
                'option1',
                1,
                '10.2500',
                '["option/2016-11-17/1479383560582d9a083f0665.28448890.png"]',
                'option1',
                12,
                1479383561,
                1479383561
            ],
            [
                'option2',
                2,
                '45.3600',
                '["option/2016-11-17/1479383577582d9a19737e54.06320443.png"]',
                'option2',
                1,
                1479383578,
                1479383578
            ]
        ]);

        $this->batchInsert('{{%product}}', [
            'name',
            'icon',
            'gallery',
            'price',
            'description',
            'stock',
            'created_at',
            'updated_at'
        ], [
            [
                'prod1',
                '["product/2016-11-17/1479383722582d9aaab84239.78811495.png"]',
                '["product/2016-11-17/1479383735582d9ab7bb4870.20646831.png","product/2016-11-17/1479383740582d9abca4e3a3.27266162.png"]',
                '10.0000',
                'prod',
                1,
                1479383743,
                1479383743
            ],
            [
                'prod2',
                '["product/2016-11-17/1479383761582d9ad14963d0.93255919.png"]',
                '["product/2016-11-17/1479383764582d9ad47925e5.04511665.png","product/2016-11-17/1479383768582d9ad8c44f57.53986411.png"]',
                '15.2500',
                'prod2',
                12,
                1479383773,
                1479383773
            ]
        ]);
    }

    public function down()
    {

    }


}
