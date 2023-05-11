<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Route::get('/', function () {
  //  return view('welcome');
//});

Route::resource('/', 'home');
//Route::get('/{dato}', 'home@cargar');
Route::get('home/horario/{dato}', 'home@cargar');

// Route::get('/', function () { return redirect('/admin/home'); });

// Authentication Routes...
$this->get('login', 'Auth\LoginController@showLoginForm')->name('auth.login');
$this->post('login', 'Auth\LoginController@login')->name('login');
$this->post('logout', 'Auth\LoginController@logout')->name('auth.logout');

// Change Password Routes...
$this->get('change_password', 'Auth\ChangePasswordController@showChangePasswordForm')->name('auth.change_password');
$this->patch('change_password', 'Auth\ChangePasswordController@changePassword')->name('auth.change_password');

// Password Reset Routes...
$this->get('password/reset', 'Auth\ForgotPasswordController@showLinkRequestForm')->name('auth.password.reset');
$this->post('password/email', 'Auth\ForgotPasswordController@sendResetLinkEmail')->name('auth.password.reset');
$this->get('password/reset/{token}', 'Auth\ResetPasswordController@showResetForm')->name('password.reset');
$this->post('password/reset', 'Auth\ResetPasswordController@reset')->name('auth.password.reset');

Route::group(['middleware' => ['auth'], 'prefix' => 'admin', 'as' => 'admin.'], function () {
    Route::get('/home', 'HomeController@index');
    Route::resource('permissions', 'Admin\PermissionsController');
    Route::post('permissions_mass_destroy', ['uses' => 'Admin\PermissionsController@massDestroy', 'as' => 'permissions.mass_destroy']);
    Route::resource('roles', 'Admin\RolesController');
    Route::post('roles_mass_destroy', ['uses' => 'Admin\RolesController@massDestroy', 'as' => 'roles.mass_destroy']);
    Route::resource('users', 'Admin\UsersController');
    Route::post('users_mass_destroy', ['uses' => 'Admin\UsersController@massDestroy', 'as' => 'users.mass_destroy']);

    //gestor de materias para admin
    Route::resource('materias', 'Admin\MateriasController');
    Route::post('materias_mass_destroy', ['uses' => 'Admin\MateriasController@massDestroy', 'as' => 'materias.mass_destroy']);

    //gestor grupo materia
    Route::resource('gruposMateria', 'Admin\GruposMateriaController');
    Route::post('grupoMateria_mass_destroy', ['uses' => 'Admin\GruposMateriaController@massDestroy', 'as' => 'gruposMateria.mass_destroy']);

    //gestor de laboratorios
    Route::resource('laboratorios', 'Admin\LaboratoriosController');
    Route::post('laboratorios_mass_destroy', ['uses' => 'Admin\LaboratoriosController@massDestroy', 'as' => 'laboratorios.mass_destroy']);

    //gestor de grupos de laboratorio
    Route::resource('gruposLaboratorio', 'Admin\GruposLaboratorioController');
    Route::post('grupoLaboratorio_mass_destroy', ['uses' => 'Admin\GruposLaboratorioController@massDestroy', 'as' => 'gruposLaboratorio.mass_destroy']);

    //gestion de asignaciones estudiantes
    Route::resource('asignaciones', 'Admin\AsignacionesController');
    Route::post('asignacion_mass_destroy', ['uses' => 'Admin\AsignacionesController@massDestroy', 'as' => 'asignaciones.mass_destroy']);
    Route::get('asiganar/{$materia_id}', 'Admin\AsignacionesController@cargar');//Trabajando

    //gestion de asignaciones auxiliares
    Route::resource('auxasignaciones', 'Admin\AuxasignacionesController');
    Route::post('auxasignacion_mass_destroy', ['uses' => 'Admin\AuxasignacionesController@massDestroy', 'as' => 'auxasignaciones.mass_destroy']);


});


//Inicio Secccion Docente

    //seccion materias
    Route::resource('docmaterias', 'Docente\MateriasController');
    Route::post('Docente/materias_mass_destroy', ['uses' => 'Docente\MateriasController@massDestroy', 'as' => 'materias.mass_destroy']);
    Route::get('docente/materia/{materia_id}/{estudiante_id}', 'Docente\MateriasController@cargarActividades'); // trabajando
    Route::get('estudiante/materia/{materia_id}/{estudiante_id}', 'Estudiante\TareasController@cargarPortafolio');
    //post publicaciones
    Route::get('docente/posts','Docente\PostsController@index')->name('docente.posts.index');
    Route::get('docente/postss/{materiaID}','Docente\PostsController@otro')->name('docente.postss.index'); //aqui
    Route::get('docente/posts/create','Docente\PostsController@create')->name('docente.posts.create');
    Route::post('docente/posts','Docente\PostsController@store')->name('docente.posts.store');
    Route::get('docente/posts/{post}','Docente\PostsController@edit')->name('docente.posts.edit');
    Route::get('docente/postss/{post}/{materiaID}','Docente\PostsController@otro1')->name('docente.postss.edit'); //aqui
    Route::put('docente/posts/{post}','Docente\PostsController@update')->name('docente.posts.update');
    Route::post('docente/posts/{post}/photos','Docente\PhotosController@store')->name('docente.posts.photos.update');
    Route::delete('docente/photos/{photo}','Docente\PhotosController@destroy')->name('docente.photos.destroy');

    //ver posts
    Route::get('docente/posts/blog/{id}','Docente\PostsController@show')->name('docente.posts.show');

//Fin Seccion Docente

//Inicio Seccion Auxiliar
    //seccion materias
    Route::resource('auxmaterias', 'Auxiliar\MateriasController');
    Route::post('Auxiliar/materias_mass_destroy', ['uses' => 'Auxiliar\MateriasController@massDestroy', 'as' => 'materias.mass_destroy']);
//Fin Seccion Auxiliar


//Inicio Seccion Estudiante
    //seccion materias
    Route::resource('estmaterias', 'Estudiante\MateriasController');
    Route::post('Estudiante/materias_mass_destroy', ['uses' => 'Estudiante\MateriasController@massDestroy', 'as' => 'materias.mass_destroy']);
    //ver tareas
    Route::get('/estudiante/tareas/{materia_id}', 'Estudiante\PagesController@home')->name('estudiante.tareas.home');
    Route::get('/estudiante/tareas/blog/{id}','Estudiante\PostsController@show')->name('estudiante.posts.show');
    //subir tareas
    Route::get('estudiante/tareas','Estudiante\TareasController@index')->name('estudiante.tareas.index');
    Route::get('estudiante/tareas/create','Estudiante\TareasController@create')->name('estudiante.tareas.create');
    Route::post('estudiante/tareass','Estudiante\TareasController@store')->name('estudiante.tareas.store');
    Route::get('estudiante/tareass/{tarea}','Estudiante\TareasController@edit')->name('estudiante.tareas.edit');
    Route::put('estudiante/tareass/{tarea}','Estudiante\TareasController@update')->name('estudiante.tareas.update');
    Route::post('estudiante/tareass/{tarea}/files','Estudiante\FilesController@store')->name('estudiante.tareass.files.update');
    Route::delete('estudiante/files/{photo}','Estudiante\FilesController@destroy')->name('estudiante.files.destroy');

//Fin Seccion Estudiante


Route::resource('/est', 'Estudiante\estudianteController');
Route::post('estudiante_mass_destroy', ['uses' => 'Estudiante\estudianteController@massDestroy', 'as' => 'estudiante.mass_destroy']);





//Horarios laboratorios
//Horarios
Route::resource('/horario', 'Admin\HoariosController');
Route::get('/horarios/{dato}', 'Admin\HoariosController@horarios');


//Registro masivo
Route::resource('/import', 'Admin\RegistroMasivoController');
Route::post('/cargar', 'Admin\RegistroMasivoController@guardar');







//Trabajando
    // Route::resource('auxmaterias', 'Aux\MateriasController');
    Route::get('actividades', 'Aux\MateriasController@actividades');
    Route::post('materias_mass_destroy', ['uses' => 'Aux\MateriasController@massDestroy', 'as' => 'materias.mass_destroy']);


//Actividades
    Route::resource('/actividades', 'Aux\ActividadController');
    Route::get('actividades/{materia_id}/{estudiante_id}', 'Aux\ActividadController@index');
    Route::post('actividades_mass_destroy', ['uses' => 'Aux\ActividadController@massDestroy', 'as' => 'actividad.mass_destroy']);



//Sesiones
    // auxiliar
    Route::resource('/sesiones', 'Auxiliar\SesionesController');
    Route::get('/sesiones/{materia_id}/{user_id}', 'Auxiliar\SesionesController@index');
    Route::get('/crearsesion/{materia_id}/{user_id}', 'Auxiliar\SesionesController@create');
    Route::get('/sesioneseliminar/{id}', 'Auxiliar\SesionesController@eliminar');
    
    //Docente
    Route::get('/docsesiones/{materia_id}/{user_id}', 'Docente\SesionesController@index');


    // Route::get('/sesiones/eliminar/{id}', 'Auxiliar\SesionesController@eliminar');
    // Route::get('/sesiones/agregar', 'Auxiliar/SesionesController@guardar');
    // Route::get('sesiones/{materia_id}/{estudiante_id}/{sesion_id}', 'Auxiliar\SesionesController@index');
    // Route::post('actividades_mass_destroy', ['uses' => 'Auxiliar\SesionesController@massDestroy', 'as' => 'sesiones.mass_destroy']);

