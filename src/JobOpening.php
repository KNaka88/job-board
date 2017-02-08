<?php
  class JobOpening
  {
      private $title;
      private $description;
      private $contact;

      function __construct($title, $description, $contact)
      {
          $this->title = $title;
          $this->description = $description;
          $this->contact = $contact;
      }

      function setJobOpening($new_title, $new_description, $new_contact)
      {
          $this->title = $new_title;
          $this->description = $new_description;
          $this->contact = $new_contact; // passes Contact object
      }

      function getTitle()
      {
          return $this->title;
      }

      function getDescription()
      {
          return $this->description;
      }

      function getName()
      {
        return $this->contact->getName();
      }
      function getEmail()
      {
        return $this->contact->getEmail();
      }
      function getPhone()
      {
        return $this->contact->getPhone();
      }

      function save()
      {
          array_push($_SESSION['list_of_jobs'], $this);
      }

      static function deleteAll(){
          $_SESSION['list_of_jobs'] = array();
      }
  }
 ?>
