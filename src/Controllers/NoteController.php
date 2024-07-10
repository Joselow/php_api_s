<?php

namespace NotesApp\Controllers;

use NotesApp\Models\Note;

class NoteController {
  private $noteModel = null;
  public function __construct() {
    $this->noteModel = new Note;
  }

  public function index(){
      $notes = $this->noteModel->index();
      
      header('Content-Type: application/json');
      echo json_encode($notes);
  }

  public function create($payload){
      $data = json_decode($payload);

      if ($data === null || !isset($data->title) || !isset($data->content)) {
          echo json_encode(['error' => 'Asegúrate de incluir title y content.']);
          return;
      }

      $notes = $this->noteModel->create($data);

      header('Content-Type: application/json');
      echo json_encode($notes);
  }
  public function update(){
      $notes = $this->noteModel->update();

      header('Content-Type: application/json');
      echo json_encode($notes);
  }
  public function delete(){
      $notes = $this->noteModel->delete();

      header('Content-Type: application/json');
      echo json_encode($notes);
  }
  public function error(){
    http_response_code(405);
    echo json_encode(array('error' => 'Método no permitido'));
  }
}
