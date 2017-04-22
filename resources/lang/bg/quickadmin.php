<?php

return [
		'user-management' => [		'title' => 'User Management',		'created_at' => 'Time',		'fields' => [		],	],
		'roles' => [		'title' => 'Roles',		'created_at' => 'Time',		'fields' => [			'title' => 'Title',		],	],
		'users' => [		'title' => 'Users',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',			'email' => 'Email',			'password' => 'Password',			'role' => 'Role',			'remember-token' => 'Remember token',		],	],
		'find-tires-by-car-number' => [		'title' => 'Find tires by car number',		'created_at' => 'Time',		'fields' => [		],	],
		'car-brands' => [		'title' => 'Car brands',		'created_at' => 'Time',		'fields' => [			'name' => 'Name',		],	],
		'car-models' => [		'title' => 'Car models',		'created_at' => 'Time',		'fields' => [			'description' => 'Description',			'motor' => 'Motor',			'car-brand' => 'Car brand',			'tires' => 'Tires',		],	],
		'car-numbers' => [		'title' => 'Car numbers',		'created_at' => 'Time',		'fields' => [			'number' => 'Number',			'car-model' => 'Car model',		],	],
		'tires' => [		'title' => 'Tires',		'created_at' => 'Time',		'fields' => [			'description' => 'Description',		],	],
	'custom_controller_index' => 'Персонализиран контролер.',
	'quickadmin_title' => 'Find tires by car number v3',
];