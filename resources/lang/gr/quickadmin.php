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
	'qa_create' => 'Δημιουργία',
	'qa_save' => 'Αποθήκευση',
	'qa_edit' => 'Επεξεργασία',
	'qa_view' => 'Εμφάνιση',
	'qa_update' => 'Ενημέρωησ',
	'qa_list' => 'Λίστα',
	'qa_no_entries_in_table' => 'Δεν υπάρχουν δεδομένα στην ταμπέλα',
	'custom_controller_index' => 'index προσαρμοσμένου controller.',
	'qa_logout' => 'Αποσύνδεση',
	'qa_add_new' => 'Προσθήκη νέου',
	'qa_are_you_sure' => 'Είστε σίγουροι;',
	'qa_back_to_list' => 'Επιστροφή στην λίστα',
	'qa_dashboard' => 'Dashboard',
	'qa_delete' => 'Διαγραφή',
	'quickadmin_title' => 'Find tires by car number v3',
];