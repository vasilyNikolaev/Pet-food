<?php

  session_start();

  require_once '../db.php';

  if (isset($_POST['id'])) {

    $id = $_POST['id'];
    $product = $connect->query("SELECT * FROM products WHERE id='$id'");
    $product = $product->fetch(PDO::FETCH_ASSOC);

    if (isset($_SESSION['card'][$id])) {
      $_SESSION['card'][$id]['quantity'] += 1;
    }else {
      $_SESSION['card'][$id] = [
        'title' => $product['title'],
        'price' => $product['price'],
        'text' => $product['text'],
        'img' => $product['img'],
        'quantity' => 1,
      ];
    };

    $_SESSION['totalQuantity'] = $_SESSION['totalQuantity'] ? $_SESSION['totalQuantity'] += 1 : 1;
    $_SESSION['totalPrice'] = $_SESSION['totalPrice'] ? $_SESSION['totalPrice'] += $product['price'] : $product['price'];
  };
  // echo "<pre>";
  // var_dump($_SESSION);
  // echo "</pre>";
  header('Location: ' . $_SERVER['HTTP_REFERER']);
?>
