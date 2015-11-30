<?php
namespace Controller;

use Classes\Controller;
use Interfaces\ControllerInterface;
use Model\GuestbookEntry;

/**
 * Handles the new entry
 */
class NewController extends Controller implements ControllerInterface {

  /**
   * New entry
   * @var GuestbookEntry $entry
   */
  private $entry;

  public function __construct() {
    parent::__construct();
  }

  /**
   * Fill and save entry object
   */
  public function execute() {
    if (filter_input(INPUT_POST, 'save') !== NULL) {
      $this->entry = new GuestbookEntry();
      $this->entry->setAuthor("Anton");
      $this->entry->setContent(filter_input(INPUT_POST, 'content', FILTER_SANITIZE_SPECIAL_CHARS));
      $this->entry->setTitle(filter_input(INPUT_POST, 'title', FILTER_SANITIZE_SPECIAL_CHARS));
      $this->saveEntry();
      $this->redirectTo("/list");
    } else {
      $this->renderView();
    }
  }

  /**
   * Save the new entry into database
   */
  private function saveEntry() {
    $query = "INSERT INTO entry (title, content, author, createdAt) VALUES (:title, :content, :author, datetime('now'))";
    $stmt = $this->db->prepare($query); 
    $stmt->bindParam(':title', $this->entry->getTitle());
    $stmt->bindParam(':content', $this->entry->getContent());
    $stmt->bindParam(':author', $this->entry->getAuthor());
    $stmt->execute();
  }

}
