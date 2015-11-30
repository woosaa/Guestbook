<?php
namespace Model;
/*
 * GuestbookEntry Datamodel
 */

class GuestbookEntry {

  private $id;
  private $author;
  private $title;
  private $content;
  private $createdAt;

  public function setId($id) {
    $this->id = $id;
  }

  public function setAuthor($author) {
    $this->author = $author;
  }

  public function setTitle($title) {
    $this->title = $title;
  }

  public function setContent($content) {
    $this->content = $content;
  }

  public function setCreatedAt($createdAt) {
    $this->createdAt = $createdAt;
  }

  public function getId() {
    return $this->id;
  }

  public function getTitle() {
    return $this->title;
  }

  public function getContent() {
    return $this->content;
  }

  /**
   * @return String link to detailed view
   */
  public function getLink() {
    return "/detail/" . $this->id;
  }

  /**
   * @return String description for the entry
   */
  public function getDescription() {
    return "Created by " . $this->author . " at " . $this->createdAt;
  }

  public function getAuthor() {
    return $this->author;
  }

  public function getCreatedAt() {
    return $this->createdAt;
  }

}
