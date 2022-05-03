<?php

class Order
{
   private $ID, $products, $user, $creditCard, $subtotal, $total, $discount = 0.2;

   public function __construct($ID, $user, $products, $creditCard){
      $this->ID = $ID;
      $this->products = $products;
      $this->user = $user;
      $this->creditCard = $creditCard;
   }

   public function getID()
   {
      return $this->ID;
   }

   public function getTotal()
   {
      if ($this->creditCard->getValidity()) {
         if ($this->user->getRegistered()) {
            foreach ($this->products as $product) {
               $this->subtotal = $product->getPrice() - ($product->getPrice() * $this->discount);
               $this->total += $this->subtotal;
            }
            return $this->total;
         } else {
            foreach ($this->products as $product) {
               $this->subtotal = $product->getPrice();
               $this->total += $this->subtotal;
            }
            return $this->total;
         }
      } else {
         return '<em>Expired credit card!</em>';
      }
   }
}