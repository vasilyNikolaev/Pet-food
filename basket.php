<?php

  require_once 'blocks/header.php';

?>
<main>
  <div class="paymentPurchases">
    <?php
    if (count($_SESSION['card']) == 0 ) { ?>
      <div class="emptyBasket">
        <img src="img/cat1.png" alt="Грустная кошка" width="156" height="156">
        <p>
          Корзина пуста(
        </p>
      </div>
    <?php }else {
      foreach ($_SESSION['card'] as $key=>$product) {
    ?>
    <div class="basket">
      <div class="img">
        <img src="img/cats/<?=$product["img"]?>" alt="<?=$product["title"]?>" width="60" height="110">
      </div>
      <div class="title">
        <p>
          <?=$product["title"]?>
        </p>
        <p>
          <?=$product["text"]?>
        </p>
      </div>
      <div class="quantity">
        <p>
          Кол-во: <?=$product["quantity"]?>
        </p>
      </div>
      <div class="price">
        <p>
          <?=$product["price"] * $product["quantity"]?>р
        </p>
      </div>
      <form action="actions/delete.php" method="post">
        <input type="hidden" name="delete" value="<?=$key?>">
        <button type="submit" name="button" class="buttonDel"></button>
      </form>
    </div>
    <?php } } ?>
    <div class="containerPayment">
      <div>
        <button type="submit" name="button" class="buttonBuyBasket">Перейти к оформлению покупки</button>
        <div class="total">
          <p>
            Итого:
          </p>
          <p>
            <?=$_SESSION['totalPrice']?>р
          </p>
        </div>
      </div>
    </div>
  </div>
</main>
<form action="actions/mail.php" method="post">
  <section class="sendingMail">
    <div class="name entryField">
      <label for="name">
        Ваше имя:
      </label>
      <input type="text" name="name" id="name" value="" required placeholder="Иван">
    </div>
    <div class="email entryField">
      <label for="email">
        Ваш e-mail:
      </label>
      <input type="text" name="email" id="email" value="" required placeholder="ivan@gmail.com">
    </div>
    <div class="phone entryField">
      <label for="phone">
        Ваш телефон:
      </label>
      <input type="text" name="phone" id="phone" value="" required placeholder="+7(912)-809-67-00">
    </div>
    <div class="address entryField">
      <label for="address">
        Адрес доставки
      </label>
      <input type="text" name="address" id="address" value="" required placeholder="Москва, Скворцова, 7">
    </div>
    <div class="button">
      <input type="submit" name="buttonMail" value="Отправить" class="buttonMail">
      <input type="button" name="buttonCansel" value="Закрыть" class="buttonCansel buttonMail">
    </div>
  </section>
</form>

<?php
  require_once 'blocks/footer.php';
?>
<script src="js/popup.js"></script>
</body>
</html>
