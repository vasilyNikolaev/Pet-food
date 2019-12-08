<?php

  require_once 'blocks/header.php';

  $products = $connect->query( "SELECT * FROM products" );
  $products = $products->fetchALL( PDO::FETCH_ASSOC );



?>

<main class="indexMain">
  <div class="containerSlider">
    <section class="slider">
      <button id="bottonLeft"></button>
      <button id="bottonRight"></button>
      <div id='polosa'>
        <div class="item">
          <div>
            <img src="img/dog1.png" alt="Собака">
          </div>
          <div>
            <h1>
              Корм для собак
            </h1>
            <p>
              Источник полноценного комплекса питательных веществ и минералов,  разработана для поддержания пищеварительной системы в здоровом состоянии, в полном объеме компенсирует затраты энергии.
            </p>
            <a href="product.php?cat=собак" class="botton_buy">Купить</a>
          </div>
        </div>

        <div class="item">
          <div>
            <img src="img/cat1.png" alt="Кошка">
          </div>
          <div>
            <h1>
              Корм для кошек
            </h1>
            <p>
              Полнорационное сбалансированное питание для взрослых кошек, специально разработан для укрепления основных защитных систем кошки – иммунной, пищеварительной, выделительной.
            </p>
            <a href="product.php?cat=кошек" class="botton_buy">Купить</a>
          </div>
        </div>
        <div class="item">
          <div>
            <img src="img/bird1.png" alt="Птица">
          </div>
          <div>
            <h1>
              Корм для птиц
            </h1>
            <p>
              В кормах использованы только бережно отобранные, выращенные под солнцем лучшие семена. Хорошо сбалансированный состав соответствует индивидуальным особенностям птиц.
            </p>
            <a href="product.php?cat=птиц" class="botton_buy">Купить</a>
          </div>
        </div>
        <div class="item">
          <div>
            <img src="img/fish1.png" alt="Рыба">
          </div>
          <div>
            <h1>
              Корм для рыб
            </h1>
            <p>
              Комплексный корм, предназначенный для кормления различных видов аквариумных рыб и составленный из более 40 компонентов, в том числе и таких (важные), как спирулина, криль, рыбная мука.
            </p>
            <a href="product.php?cat=рыб" class="botton_buy">Купить</a>
          </div>
        </div>
      </div>
    </section>
  </div>
    <section class="indexCatalog">
      <div class="catalog">
        <div class="block">
          <a href="product.php?cat=dog">
            <div class="blockImg">
              <img src="img/dog_cat.png" alt="Собака">
            </div>
            <div class="blockText">
              <p>
                Корм для собак
              </p>
              <a href="product.php?cat=собак" class="linkBuy">
                Подробнее
              </a>
            </div>
          </a>
        </div>
        <div class="block">
          <a href="product.php?cat=cat">
            <div class="blockImg">
              <img src="img/cat_cat.png" alt="Кошка">
            </div>
            <div class="blockText">
              <p>
                Корм для кошек
              </p>
              <a href="product.php?cat=кошек" class="linkBuy">
                Подробнее
              </a>
            </div>
          </a>
        </div>
        <div class="block">
          <a href="product.php?cat=bird">
            <div class="blockImg">
              <img src="img/bird_cat.png" alt="Птица">
            </div>
            <div class="blockText">
              <p>
                Корм для птиц
              </p>
              <a href="product.php?cat=птиц" class="linkBuy">
                Подробнее
              </a>
            </div>
          </a>
        </div>
        <div class="block">
          <a href="product.php?cat=fish">
            <div class="blockImg">
              <img src="img/fish_cat.png" alt="Рыба">
            </div>
            <div class="blockText">
              <p>
                Корм для рыб
              </p>
              <a href="product.php?cat=рыб" class="linkBuy">
                Подробнее
              </a>
            </div>
          </a>
        </div>
      </div>
    </section>
    <div class="strip">
      <div>
        <p>
          ПОПУЛЯРНЫЕ ТОВАРЫ
        </p>
      </div>
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
