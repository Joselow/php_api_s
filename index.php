<?php
require __DIR__ . '../vendor/autoload.php';

use NotesApp\Controllers\NoteController;
use NotesApp\Router\NoteRouter;

$request_uri = $_SERVER['REQUEST_URI'];
$request_method = $_SERVER['REQUEST_METHOD'];
$payload = file_get_contents('php://input');


switch ($request_uri) {
  case '/':
    NoteRouter::route($request_method, $payload);
    break; 

default:
    http_response_code(404); // Ruta no encontrada
    echo json_encode(array('error' => 'Ruta no encontrada'));
    break;
}
