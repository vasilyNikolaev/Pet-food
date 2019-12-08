<?php
  require_once 'blocks/header.php';

  if (isset($_GET['cat'])) {
    $currentCat = $_GET['cat'];
    $products = $connect->query( "SELECT * FROM products WHERE cats='$currentCat'" );
    $products = $products->fetchALL( PDO::FETCH_ASSOC );
  }

?>
<div class="breadСrumbs">
  <p>
    Корм для <?=$currentCat?>
  </p>
  <ul>
    <li>
      <a href="index.php">Главная</a>
    </li>
    <li class="currentPage">
      <a>Корм для <?=$currentCat?></a>
    </li>
  </ul>
</div>
<section class="cardProduct">
  <?php foreach ($products as $product) { ?>
  <div class="card">
      <img src="img/cats/<?=$product["img"]?>" alt="<?=$product["title"]?>">
      <p class="title">
        <?=$product["title"]?>
      </p>
      <p class="description">
        <?=$product["text"]?>
      </p>
      <div class="price">
        <p>
          <?=$product["price"]?>р
        </p>
        <form class="" action="actions/add.php" method="post">
          <input type="hidden" name="id" value="<?=$product["id"]?>">
          <button type="submit" name="button" class="buttonBuy">Купить</button>
        </form>
      </div>
  </div>
<?php } ?>
</section>
</main>

<?php
  require_once 'blocks/footer.php';
?>
<script src="js/main.js"></script>
</body>
</html>
