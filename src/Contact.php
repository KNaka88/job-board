<?php
  class Contact
  {
    private $name;
    private $email;
    private $phone;

    function __construct($name, $email, $phone)
    {
      $this->name = $name;
      $this->email = $email;
      $this->phone = $phone;
    }

    function setContact($new_name, $new_email, $new_phone)
    {
      $this->name = $new_name;
      $this->email = $new_email;
      $this->phone = $new_phone;
    }

    function getName()
    {
      return $this->name;
    }
    function getEmail()
    {
      return $this->email;
    }
    function getPhone()
    {
      return $this->phone;
    }


  }


 ?>
