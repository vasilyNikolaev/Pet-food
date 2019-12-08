<?php

  session_start();

  require_once 'db.php';

  $cats = $connect->query( "SELECT * FROM cats" );
  $cats = $cats->fetchALL( PDO::FETCH_ASSOC );

?>
<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Pet food</title>
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="main.css">
  <link href="https://fonts.googleapis.com/css?family=Lobster" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
</head>
<body>
<header>
  <section class="siteHeader">
    <div class="block1">
      <a href="index.php">
        <p class="logo">
          Pet food
        </p>
      </a>
    </div>
    <div class="block2">
      <a href="basket.php">
        <p class="quantityOfGoods">
          <?=$_SESSION['totalQuantity']?>
        </p>
        <p class="price">
          <?=$_SESSION['totalPrice'] ? $_SESSION['totalPrice'] : 0 ?>р
        </p>
      </a>
    </div>
  </section>
  <section class="headerСatalog">
    <ul class="catalog">
      <li class="item1">
        <a href="index.php">
          Главная
        </a>
      </li>
      <li class="item2">
        <a href="product.php?cat=собак">
          Собаки
        </a>
      </li>
      <li class="item3">
        <a href="product.php?cat=кошек">
          Кошки
        </a>
      </li>
      <li class="item4">
        <a href="product.php?cat=рыб">
          Рыбки
        </a>
      </li>
      <li class="item5">
        <a href="product.php?cat=птиц">
          Птицы
        </a>
      </li>
    </ul>
  </section>
</header>
