<?php

return [
	
	'user-management' => [
		'title' => 'Gestor de Usuarios',
		'created_at' => 'Time',
		'fields' => [
		],
	],
	
	'permissions' => [
		'title' => 'Permisos',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
		],
	],
	
	'roles' => [
		'title' => 'Roles',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
			'permission' => 'Permisos',
		],
	],
	
	'materias' => [
		'title' => 'Materias',
		'created_at' => 'Time',
		'fields' => [
			'nombremateria' => 'Nombre Materia',
			'codigomateria' => 'Codigo Materia',
			'descripcionmateria' => 'Descripcion Materia',
		],
	],

	'laboratorios' => [
		'title' => 'Laboratorios',
		'created_at' => 'Time',
		'fields' => [
			'nombrelab' => 'Nombre Laboratorio',
			'nummaquinas' => 'Numero de Maquinas',
		],
	],

	'gruposLaboratorio' => [
		'title' => 'Grupos de Laboratorio',
		'created_at' => 'Time',
		'fields' => [
			'nombregrupolab' => 'Nombre grupo laboratorio',
			'materia_id' => 'materia id',
			'laboratorio_id' => 'laboratorio id',
			'diagrupo' => 'Dia',
			'horagrupo' => 'Hora',
		],
	],

	'gruposMateria' => [
		'title' => 'Grupos de Materia',
		'created_at' => 'Time',
		'fields' => [
			'nombregrupomat' => 'Nombre grupo laboratorio',
			'materia_id' => 'materia',
			'user_id' => 'Docente ',
		],
	],

	'asignaciones' => [
		'title' => 'Asignaciones Estudiante a Grupos Materia y Laboratorio',
		'created_at' => 'Time',
		'fields' => [
			'user_id' => 'usuario',
			'grupomateria_id' => 'Grupo Materia',
			'grupolaboratorio_id' => 'Grupo Laboratorio ',
		],
	],

	'users' => [
		'title' => 'Usuario',
		'created_at' => 'Time',
		'fields' => [
			'name' => 'Nombre',
			'apellidopaterno' => 'Apellido Paterno',
			'apellidomaterno' => 'Apellido Materno',
			'cedula' => 'Cedula',
			'codigosiss' => 'Codigosiss',
			'email' => 'Correo',
			'password' => 'Contrasenia',
			'roles' => 'Roles',
			'remember-token' => 'Remember token',
		],
	],
	'app_create' => 'Crear',
	'app_save' => 'Guardar',
	'app_edit' => 'Editar',
	'app_view' => 'Mostrar',
	'app_update' => 'Actualizar',
	'app_list' => 'Listar',
	'app_no_entries_in_table' => 'No hay entradas en la tabla',
	'custom_controller_index' => 'Indice de controlador personalizado.',
	'app_logout' => 'Salir',
	'app_add_new' => 'Agregar Nuevo',
	'app_are_you_sure' => 'esta usted seguro?',
	'app_back_to_list' => 'Volver a la lista',
	'app_dashboard' => 'Inicio',
	'app_delete' => 'Eliminar',
	'global_title' => 'UMSS',
];