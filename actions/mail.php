<?php
  $name = strip_tags(trim($_POST['name']));
  $email = strip_tags(trim($_POST['email']));
  $phone = strip_tags(trim($_POST['phone']));
  $address = strip_tags(trim($_POST['address']));
  mail("ivan@gmail.com", "Заявка с сайта", "Имя:".$name." E-mail:".$email." Телефон:".$phone." Адрес:".$address );
  header('Location: ../basket.php');
?>
