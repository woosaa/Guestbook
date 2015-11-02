<?php

/**
 * Displays the detail view of an entry
 */
class DetailController extends Controller {

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
    $stmt = $this->db->prepare("SELECT * FROM entry WHERE ID = :id");

    $id = $this->request->getParams()[1]; // [0] -> view; [1] -> id ; // detail/:id
    if (is_numeric($id)) {  //Only numeric param (ID) allowed
      $stmt->bindValue(':id', $id, PDO::PARAM_INT);
      $stmt->execute();

      $entry = $stmt->fetch(PDO::FETCH_ASSOC);
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
