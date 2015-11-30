<?php
namespace Controller;

use Model\GuestbookEntry;
use Classes\Controller;
use Interfaces\ControllerInterface;
/**
 * Displays the detail view of an entry
 */
class DetailController extends Controller implements ControllerInterface{

  /**
   * @var GuestbookEntry $entry
   */
  private $entry;

  public function __construct() {
    parent::__construct();
  }

  /**
   * Render detail view with loaded entry
   */
  public function execute() {
    $this->loadEntry();
    $this->renderView();
  }

  /**
   * Fetchs GuestbookEntry from database with given ID if correct id was provided
   * from $request->getParams()
   */
  private function loadEntry() {
    $id = $this->request->getParams()[1]; // [0] -> view; [1] -> id ; // detail/:id
    if (is_numeric($id)) {  //Only numeric param (ID) allowed
      $stmt = $this->db->prepare('SELECT * FROM entry WHERE ID=:id;');
      $stmt->bindValue(':id', $id, SQLITE3_INTEGER);
      $result = $stmt->execute();
      $entry = $result->fetchArray();
      if ($entry) {
        $currentEntry = new GuestbookEntry();
        $currentEntry->setId($entry['ID']);
        $currentEntry->setAuthor($entry['author']);
        $currentEntry->setTitle($entry['title']);
        $currentEntry->setContent($entry['content']);
        $currentEntry->setCreatedAt($entry['createdAt']);
        $this->entry = $currentEntry;
      } else {
        $this->redirectTo("/list");
      }
    } else {
      $this->redirectTo("/list");
    }
  }

  /**
   * Getter for $this->entry
   * @return GuestbookEntry $entry
   */
  public function getEntry() {
    return $this->entry;
  }

}
