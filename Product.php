<?php

abstract class Product
{
   protected $name, $price, $destPet, $brand, $img;

   public function __construct(string $name, int $priceCents, string $destPet, string $brand) {
      $this->name = $name;
      $this->price = $priceCents / 100;
      $this->destPet = $destPet;
      $this->brand = $brand;
   }

   public function getName() {
      return $this->name;
   }

   public function getPrice()
   {
      return $this->price;
   }

   public function getDestPet()
   {
      return $this->destPet;
   }

   public function getBrand()
   {
      return $this->brand;
   }

   public function getImg()
   {
      return $this->img = 'https://picsum.photos/100?random=' . rand(1, 100);
   }
}



class Food extends Product
{
   private $format, $consistency, $expirationDate;

   public function __construct(string $name,int $priceCents, string $destPet, string $brand, string $format, string $consistency, string $expirationDate){
      parent::__construct($name, $priceCents, $destPet, $brand);
      $this->format = $format;
      $this->consistency = $consistency;
      $this->expirationDate = $expirationDate;
   }

   public function getFormat()
   {
      return $this->format;
   }

   public function getConsistency()
   {
      return $this->consistency;
   }

   public function getExpirationDate()
   {
      return $this->expirationDate;
   }
}

