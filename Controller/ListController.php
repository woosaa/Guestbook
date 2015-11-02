<?php

/**
 * Loads all entries from database and renders the list view
 */
class ListController extends Controller {

  /**
   * Contains all entries
   * @var GuestbookEntry[] $entries
   */
  private $entries;

  public function __construct() {
    parent::__construct();
  }

  /**
   * Execute the list controller
   * Display list view
   */
  public function execute() {
    $this->loadAllEntries();
    $this->renderView();
  }

  /**
   * Loading the data from database and order by createdAt DESC
   */
  private function loadAllEntries() {
    $query = "SELECT * FROM entry ORDER BY createdAt DESC";
    $stmt = $this->db->query($query);
    $entries = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach ($entries as $entry) {
      $currentEntry = new GuestbookEntry();
      $currentEntry->setId($entry['ID']);
      $currentEntry->setAuthor($entry['author']);
      $currentEntry->setTitle($entry['title']);
      $currentEntry->setContent($entry['content']);
      $currentEntry->setCreatedAt($entry['createdAt']);
      $this->entries[] = $currentEntry;
    }
  }

  /**
   * Getter for $entries
   * @return GuestbookEntry[] entries
   */
  public function getEntries() {
    return $this->entries;
  }

  /**
   * Check fpr empty array of entries
   * @return bool
   */
  public function isEmpty() {
    return count($this->entries) === 0;
  }

}
