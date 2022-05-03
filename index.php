<?php

/*
Oggi pomeriggio provate ad immaginare quali sono le classi necessarie per creare uno shop online con le seguenti caratteristiche.
L'e-commerce vende prodotti per gli animali.
I prodotti saranno, oltre al cibo, anche giochi, cucce, etc.
L'utente potrà sia comprare i prodotti senza registrarsi, oppure iscriversi e ricevere il 20% di sconto su tutti i prodotti.
Il pagamento avviene con la carta di credito, che non deve essere scaduta.
BONUS:
Alcuni prodotti (es. antipulci) avranno la caratteristica che saranno disponibili solo in un periodo particolare (es. da maggio ad agosto).
*/

include_once __DIR__ . './Product.php';
include_once __DIR__ . './User.php';
include_once __DIR__ . './CreditCard.php';
include_once __DIR__ . './Order.php';


$productsList = [
   new Food('Ultima', 1250, 'cat', 'Purina', 2, 'can', 'wet', '2022-05-04'),
   new Food('Chappy', 2490, 'dog', 'Royal Canin', 10, 'box', 'dry', '2023-11-24'),
   new Food('Sheeba Mix', 850, 'cat', 'Sheeba', 0.5, 'can', 'wet', '2022-06-12')
];

$rUser_1 = new RegisteredUser('Franco', 'Zanetti', 'f.zanetti@gmail.com', 'Via G. Verdi, 3 - 20100 Milano', 'xxpasswordxx');

$crediCard_1 = new CreditCard($rUser_1->getFirstName() . ' ' . $rUser_1->getLastName(), '0123-0000-0000-0005', 111, '2022-05');

$order_1 = new Order(1478, $rUser_1, $productsList, $crediCard_1);



// class Toy
// {
//    private $toysMaterial, $toysColor, $toysSizes;
// }

// class Kennel
// {
//    private $kennelsMaterial, $kennelsColor, $kennelsPadding, $kennelsSizes;
// }

?>


<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>Order #<?= $order_1->getID() ?></title>
</head>
<body>

   <h1>Order #<?= $order_1->getID() ?></h1>
   <p>First name: <?= $rUser_1->getFirstName() ?></p>
   <p>Last name: <?= $rUser_1->getLastName() ?></p>
   <p>Ship to: <?= $rUser_1->getAddress() ?></p>
   <p>User registered: <?php if ($rUser_1->getRegistered()){ echo 'true';} else {echo 'false';}?></p>

   <h2>Your credit card:</h2>
   <ul>
      <li>Owner: <?= $crediCard_1->getName() ?></li>
      <li>Number: <?= $crediCard_1->getNumber() ?></li>
      <li>Expiration date: <?= $crediCard_1->getCardExpiration() ?></li>
      <li>Validity: <?php if ($crediCard_1->getValidity()){ echo 'true';} else {echo 'false';} ?></li>
   </ul>


   <h2>Your product list:</h2>

   <?php foreach ($productsList as $product): ?>
    <div>
       <img src="<?= $product->getImg() ?>"/>
       <p>Product: <?= $product->getName() ?></p>
       <p>Brand: <?= $product->getBrand() ?></p>
       <p>Price: € <?= $product->getPrice() ?></p>
       <hr>
   </div>
   <?php endforeach ?>

   <h3>Total: € <?= $order_1->getTotal() ?></h3>
</body>
</html>