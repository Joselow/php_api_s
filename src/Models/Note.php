<?php
namespace NotesApp\Models;

use NotesApp\lib\Database;
use PDO;

class Note {
  private $db = null;

  public function __construct() {
    $this->db = (new Database())->connect();
  }

  public function index () {
    $sql = 'SELECT * FROM notes';
    $stmt = $this->db->prepare($sql);
    $stmt->execute();

    return $stmt->fetchAll(PDO::FETCH_ASSOC);
  }
  public function create ($note) {
    $sql = 'INSERT INTO notes (uuid, title, content) VALUES (:uuid, :title, :content)';
    $stmt = $this->db->prepare($sql);
    $uuid = uniqid();
    
    $success = $stmt->execute([
      'uuid' => $uuid,
      'title' => $note->title,
      'content'=> $note->content
    ]);

    if ($success) {       
      return $this->findByUuid($uuid);
    } 
    return [
        'error' => 'some error'
      ];
  }

  public function update () {
    return [];
  }
  public function delete () {
    return [];
  }

  public function findByUuid($uuid) {
    $sql = 'SELECT * FROM notes WHERE uuid = :uuid';
    $stmt = $this->db->prepare($sql);
    $stmt->execute(['uuid' => $uuid]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
  }
}
