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
	'qa_create' => 'Create',
	'qa_save' => 'Save',
	'qa_edit' => 'Edit',
	'qa_view' => 'View',
	'qa_update' => 'Update',
	'qa_list' => 'List',
	'qa_no_entries_in_table' => 'No entries in table',
	'custom_controller_index' => 'Custom controller index.',
	'qa_logout' => 'Logout',
	'qa_add_new' => 'Add new',
	'qa_are_you_sure' => 'Are you sure?',
	'qa_back_to_list' => 'Back to list',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Delete',
	'quickadmin_title' => 'Find tires by car number v3',
];