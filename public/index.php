<?php

require_once __DIR__ . '/../includes/app.php';


use MVC\Router;
use Controllers\TorneoController;
use Controllers\OrganizadorController;
use Controllers\PaginasController;
use Controllers\LoginController;

$router = new Router();

// Zona Privada con Autenticacion de Usuario

$router->get('/admin', [TorneoController::class, 'index']);

$router->get('/torneos/crear', [TorneoController::class, 'crear']);
$router->post('/torneos/crear', [TorneoController::class, 'crear']);
$router->get('/torneos/actualizar', [TorneoController::class, 'actualizar']);
$router->post('/torneos/actualizar', [TorneoController::class, 'actualizar']);
$router->post('/torneos/eliminar', [TorneoController::class, 'eliminar']);

$router->get('/organizadores/crear', [OrganizadorController::class, 'crear']);
$router->post('/organizadores/crear', [OrganizadorController::class, 'crear']);
$router->get('/organizadores/actualizar', [OrganizadorController::class, 'actualizar']);
$router->post('/organizadores/actualizar', [OrganizadorController::class, 'actualizar']);
$router->post('/organizadores/eliminar', [OrganizadorController::class, 'eliminar']);

// Zona Liberada

$router->get('/',[PaginasController::class, 'index']);
$router->get('/torneos',[PaginasController::class, 'torneos']);
$router->get('/nosotros',[PaginasController::class, 'nosotros']);
$router->get('/torneo',[PaginasController::class, 'torneo']);
$router->get('/blog',[PaginasController::class, 'blog']);
$router->get('/entrada',[PaginasController::class, 'entrada']);
$router->get('/contacto',[PaginasController::class, 'contacto']);
$router->post('/contacto',[PaginasController::class, 'contacto']);

// Login y Autenticacion    
$router->get('/login',[LoginController::class, 'login']);
$router->post('/login',[LoginController::class, 'login']);
$router->get('/logout',[LoginController::class, 'logout']);

$router->comprobarRutas();
