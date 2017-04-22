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
	'qa_create' => 'Crear',
	'qa_save' => 'Guardar',
	'qa_edit' => 'Editar',
	'qa_view' => 'Ver',
	'qa_update' => 'Actualizar',
	'qa_list' => 'Listar',
	'qa_no_entries_in_table' => 'Sin valores en la tabla',
	'custom_controller_index' => 'Índice del controlador personalizado (index).',
	'qa_logout' => 'Salir',
	'qa_add_new' => 'Agregar',
	'qa_are_you_sure' => 'Estás seguro?',
	'qa_back_to_list' => 'Regresar a la lista?',
	'qa_dashboard' => 'Tablero',
	'qa_delete' => 'Eliminar',
	'quickadmin_title' => 'Find tires by car number v3',
];