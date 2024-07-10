<?php

namespace NotesApp\Router;

use NotesApp\Controllers\NoteController;

class NoteRouter
{
  public static function route($request_method, $payload)
  {
    $controller = new NoteController;
    switch ($request_method) {
      case 'GET':
        $controller->index();
        break;
      case 'POST':
        $controller->create($payload);
        break;
      case 'PUT':
        $controller->update();
        break;
      case 'DELETE':
        $controller->delete();
        break;
      default:
        $controller->error();
        break;
    }
  }
}
