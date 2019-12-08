<?php
  session_start();
  require_once 'db.php';

  if (isset($_POST['add'])) {

    if (!empty($_FILES['img']['tmp_name'])) {

      if (!empty($_FILES['img']['error'])) {
        $_SESSION['msq'] = 'Произошла ошибка загрузки';
      }
      if (!move_uploaded_file($_FILES['img']['tmp_name'], 'img/cats/'.$_FILES['img']['name'])) {
        // code...
      }else {
        $_SESSION['msq'] = 'Не удалось загрузить файл';
      }

    }else {
      $_SESSION['msq'] = 'Вы не загрузили файл';
    };

		$title = strip_tags(trim($_POST["title"]));
		$text = strip_tags(trim($_POST["text"]));
    $cats = strip_tags(trim($_POST["cats"]));
    $price = strip_tags(trim($_POST["price"]));
    $img = $_FILES['img']['name'];

		mysqli_query($link, "INSERT INTO products(title, text, cats, price, img) VALUES ('$title', '$text', '$cats', '$price', '$img')");
		header('Location: addproduct.php');
}
?>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <title>Pet food</title>
  <link rel="stylesheet" href="normalize.css">
  <link rel="stylesheet" href="main.css">
</head>
<body>
  <?php if ($_SESSION['msq']) {
    echo '<b>'.$_SESSION['msq'].'</b><br>';
    unset($_SESSION['msq']);
  } ?>
    <form action="addproduct.php" method="post" class="addproduct" enctype="multipart/form-data">
      <div>
        <label for="title1">
          Наименование корма
        </label>
        <input type="text" id="title1" name="title">
      </div>
      <div>
        <label for="text1">
          Описание
        </label>
        <input type="text" id="text1" name="text">
      </div>
      <div>
        <label>
          Добавить в категорию
        </label>
        <select name="cats" class="selectAdd">
          <option value="собак">Собаки</option>
          <option value="кошек">Кошки</option>
          <option value="рыб">Рыбы</option>
          <option value="птиц">Птицы</option>
        </select>
      </div>
      <div>
        <label for="price1">
          Цена
        </label>
        <input type="text" id="price1" name="price">
      </div>
      <div>
        <label for="file1">
          Загрузить изображение<br> (100px на 150px)
        </label>
        <input type="file" id="file1" name="img">
      </div>
        <input type="submit" name="add" value="Отправить" class="buttonMail">
      </form>

      <?php

        while ($row = mysqli_fetch_array($result_product)) { ?>

          <section class="conclusion">
            <div class="titleConclusion">
              <p>
                <?php echo $row["title"]; ?>
              </p>
            </div>
            <div class="textConclusion">
              <p>
                <?php echo $row["text"]; ?>
              </p>
            </div>
            <div class="priceConclusion">
              <p>
                <?php echo $row["price"]; ?>р
              </p>
            </div>
            <a class="buttonMail" href="edit.php?id=<?php echo $row["id"]; ?>">Изменить</a>
          </section>
      <?php } ?>



</body>
