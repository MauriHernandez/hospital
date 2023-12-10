<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/admin/inicio', 'AdminController::inicio');
$routes->get('/cerrarSesion', 'UsuarioController::cerrarSesion');




//INICIO DE SESION------------------------------------------------------------------
$routes->get('usuarios/login', 'UsuarioController::index');
$routes->post('usuarios/login', 'UsuarioController::index');
$routes->get('usuarios/cerrarSesion', 'UsuarioController::cerrarSesion');

//DOCTOR ---------------------------------------------------------------------------

// MOSTRAR
$routes->get('/admin/doctor/mostrar', 'AdminController::mostrarDoctor');
// AGREGAR
$routes->get('/admin/doctor/agregar', 'AdminController::agregarDoctor');
$routes->get('/admin/doctor/agregarUsuario', 'AdminController::agregarUsuario');
$routes->post('/admin/doctor/agregarUsuario', 'AdminController::agregarUsuario');
$routes->post('/admin/doctor/agregar/insert', 'AdminController::insertDoctor');
//EDITAR
$routes->get('/admin/doctor/editar/(:num)', 'AdminController::editarDoctor/$1');
$routes->post('/admin/doctor/editar/update', 'AdminController::doctorUpdate');
//ELIMINAR
$routes->get('/admin/doctor/eliminar/(:num)', 'AdminController::eliminarDoctor/$1');




//PACIENTE ---------------------------------------------------------------------------------
// MOSTRAR
$routes->get('/admin/paciente/mostrar', 'AdminController::mostrarPaciente');
// AGREGAR
$routes->get('/admin/paciente/agregar', 'AdminController::agregarPaciente');
$routes->get('/admin/paciente/agregarUsuario', 'AdminController::agregarUsuarioP');
$routes->post('/admin/paciente/agregarUsuario', 'AdminController::agregarUsuarioP');
$routes->post('/admin/paciente/agregar/insert', 'AdminController::insertPaciente');
//EDITAR
$routes->get('/admin/paciente/editar/(:num)', 'AdminController::editarPaciente/$1');
$routes->post('/admin/paciente/editar/update', 'AdminController::pacienteUpdate');
//ELIMINAR
$routes->get('/admin/paciente/eliminar/(:num)', 'AdminController::eliminarPaciente/$1');



//MEDICAMENTOS----------------------------------------------------------------------------
// MOSTRAR
$routes->get('/admin/medicamento/mostrar', 'AdminController::mostrarMedicamento');
//AGREGAR
$routes->get('/admin/medicamento/agregar', 'AdminController::agregarMedicamento');
$routes->post('/admin/medicamento/agregar', 'AdminController::agregarMedicamento');
$routes->post('/admin/medicamento/agregar/insert', 'AdminController::insertMedicamento');
//EDITAR
$routes->get('/admin/medicamento/editar/(:num)', 'AdminController::editarMedicamento/$1');
$routes->post('/admin/medicamento/editar(:num)', 'AdminController::editarMedicamento/$1');
$routes->post('/admin/medicamento/editar/update', 'AdminController::updateMedicamento');
//ELIMINAR
$routes->get('/admin/medicamento/eliminar/(:num)', 'AdminController::eliminarMedicamento/$1');



// APOYOS-----------------------------------------------------------------------------------------
//MOSTRAR--------------------------------------------------------------------------------
$routes->get('/admin/apoyo/mostrar', 'AdminController::mostrarApoyo');
//AGREGAR------------------------------------------------------------------------
$routes->get('/admin/apoyo/agregar', 'AdminController::agregarApoyo');
$routes->post('/admin/apoyo/agregar', 'AdminController::agregarApoyo');
$routes->post('/admin/apoyo/agregar/insert', 'AdminController::insertApoyo');
//EDITAR
$routes->get('/admin/apoyo/editar/(:num)', 'AdminController::editarApoyo/$1');
$routes->post('/admin/apoyo/editar(:num)', 'AdminController::editarApoyo/$1');
$routes->post('/admin/apoyo/editar/update', 'AdminController::updateApoyo');
//ELIMINAR
$routes->get('/admin/apoyo/eliminar/(:num)', 'AdminController::eliminarApoyo/$1');




//A
$routes->get('/paciente/informacion', 'PacienteController::informacion');






$routes->get('/doctor/inicio', 'DoctorController::inicio');
$routes->get('/doctor/recetas', 'DoctorController::recetas');
$routes->get('/doctor/apoyo', 'DoctorController::apoyo');

$routes->post('/doctor/recetas', 'DoctorController::recetas');

$routes->post('/doctor/apoyo', 'DoctorController::apoyo');
$routes->get('/doctor/mostrarR', 'DoctorController::mostrarR');
$routes->get('/doctor/mostrarA', 'DoctorController::mostrarA');

$routes->get('/doctor/cerrar_sesion', 'DoctorController::cerrar_sesion');
$routes->get('/admin/cerrar_sesion', 'Admin::cerrar_sesion');
$routes->get('doctor/descargar/(:num)', 'DoctorController::descargarPdf/$1');
$routes->get('doctor/descargarA/(:num)', 'DoctorController::descargarPdfA/$1');