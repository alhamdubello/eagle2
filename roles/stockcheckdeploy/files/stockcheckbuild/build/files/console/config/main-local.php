<?php
return [
    'bootstrap' => ['gii'],
    'modules' => [
        'gii' => 'yii\gii\Module',
    ],
	'controllerMap' => [
		'migrate' => [
			'class' => 'yii\console\controllers\MigrateController',
			'migrationPath' => '@app/migrations',
			'migrationNamespaces' => [
				'yii\queue\db\migrations',
			],
		],
	]
];
