<?php

namespace NotesApp\lib;

use PDO;

class Database {
  public function __construct(
    private string $host = 'localhost',
    private string $db = 'notes_app_php',
    private string $user = 'root',
    private string $password = '',
    private string $charset = 'utf8mb4',
  ){}

  public function connect() {

    try {
      $dsn = "mysql:dbname={$this->db};host={$this->host};charset={$this->charset}";
      $options = [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false,
      ];

      $pdo = new PDO($dsn, $this->user, $this->password, $options);
      return $pdo;
    } catch (\PDOException $th) {
      throw $th;
    }
  } 
}