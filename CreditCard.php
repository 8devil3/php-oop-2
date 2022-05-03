<?php

class CreditCard
{
   private $name, $number, $cvv, $cardExpiration, $validity;

   public function __construct($name, $number, $cvv, $cardExpiration) {
      $this->name = $name;
      $this->number = $number;
      $this->cvv = $cvv;
      $this->cardExpiration = $cardExpiration;
   }

   public function getName()
   {
      return $this->name;
   }

   public function getNumber()
   {
      return $this->number;
   }

   public function getCvv()
   {
      return $this->cvv;
   }

   public function getCardExpiration()
   {
      return date_format(date_create_from_format('Y-m', $this->cardExpiration), 'm/Y');
   }


   //Da perfezionare. Non calcola corettamente nel caso di scadenza nel mese attuale.
   public function getValidity()
   {
      $today = new DateTime();

      if (date_create_from_format('Y-m', $this->cardExpiration) < $today) {
         return $this->validity = false;
      } else {
         return $this->validity = true;
      }
   }
}
