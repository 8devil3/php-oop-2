<?php

abstract class User
{
   protected $firstName, $lastName, $email, $address;

   public function __construct(string $firstName, string $lastName, string $email, string $address){
      $this->firstName = $firstName;
      $this->lastName = $lastName;
      $this->email = $email;
      $this->address = $address;

      return $this;
   }

   public function getFirstName() {
      return $this->firstName;
   }

   public function getLastName() {
      return $this->lastName;
   }

   public function getEmail() {
      return $this->email;
   }

   public function getAddress() {
      return $this->address;
   }
}


class RegisteredUser extends User
{
   private $password, $registered = true;

   public function __construct(string $firstName, string $lastName, string $email, string $address, string $password){
      parent::__construct($firstName, $lastName, $email, $address);
      $this->password = $password;
   }

   public function getPassword()
   {
      return $this->password;
   }

   public function getRegistered()
   {
      return $this->registered;
   }
}


class Guest extends User
{
   private $registered = false;

   public function getRegistered()
   {
      return $this->registered;
   }
}