<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Eventos::index');

// Eventos
$routes->get('eventos', 'Eventos::index');
$routes->get('eventos/crear', 'Eventos::crear');
$routes->post('eventos/guardar', 'Eventos::guardar');
$routes->get('eventos/editar/(:num)', 'Eventos::editar/$1');
$routes->post('eventos/actualizar/(:num)', 'Eventos::actualizar/$1');
$routes->get('eventos/eliminar/(:num)', 'Eventos::eliminar/$1');

// Lugares
$routes->get('lugares', 'Lugares::index');
$routes->get('lugares/crear', 'Lugares::crear');
$routes->post('lugares/guardar', 'Lugares::guardar');
$routes->get('lugares/editar/(:num)', 'Lugares::editar/$1');
$routes->post('lugares/actualizar/(:num)', 'Lugares::actualizar/$1');
$routes->get('lugares/eliminar/(:num)', 'Lugares::eliminar/$1');

// RolesOrganizador
$routes->get('roles', 'Roles::index');
$routes->get('roles/crear', 'Roles::crear');
$routes->post('roles/guardar', 'Roles::guardar');
$routes->get('roles/editar/(:num)', 'Roles::editar/$1');
$routes->post('roles/actualizar/(:num)', 'Roles::actualizar/$1');
$routes->get('roles/eliminar/(:num)', 'Roles::eliminar/$1');

// Asistentes
$routes->get('asistentes', 'Asistentes::index');
$routes->get('asistentes/crear', 'Asistentes::crear');
$routes->post('asistentes/guardar', 'Asistentes::guardar');
$routes->get('asistentes/editar/(:num)', 'Asistentes::editar/$1');
$routes->post('asistentes/actualizar/(:num)', 'Asistentes::actualizar/$1');
$routes->get('asistentes/eliminar/(:num)', 'Asistentes::eliminar/$1');