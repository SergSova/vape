<?php
return [
    'fileManager' => [
        'storagePath' => dirname(dirname(__DIR__)) . '/www/storage',
        'storageUrl' => 'http://vape.local/storage/',
        'baseValidationRules' => [
            'file',
            'maxFiles' => 1,
            'maxSize' => 1024 * 1024,
        ],
        'attributeName' => 'file',
    ],
];
