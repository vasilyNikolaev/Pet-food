<?php

  require_once 'db.php';

  $id = $_GET['id'];

	$result_product = mysqli_query($link, " SELECT * FROM products WHERE id='$id' ");

	$row = mysqli_fetch_array($result_product);

	if (isset($_POST['save'])) {

    $title = strip_tags(trim($_POST["title"]));
		$text = strip_tags(trim($_POST["text"]));
    $price = strip_tags(trim($_POST["price"]));

		mysqli_query($link, " UPDATE products SET title='$title', text='$text', price='$price' WHERE id='$id' ");
		header('Location: addproduct.php');
	}

	if (isset($_POST['delete'])) {
		mysqli_query($link, " DELETE FROM products WHERE id='$id' ");
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
  <form action="edit.php?id=<?php echo $id; ?>" method="post" class="addproduct">
    <div>
      <label for="title1">
        Наименование корма
      </label>
      <input type="text" id="title1" name="title" value="<?php echo $row['title'] ?>">
    </div>
    <div>
      <label for="text1">
        Описание
      </label>
      <input type="text" id="text1" name="text" value="<?php echo $row['text'] ?>">
    </div>
    <div>
      <label for="price1">
        Цена
      </label>
      <input type="text" id="price1" name="price" value="<?php echo $row['price'] ?>">
    </div>
      <input type="submit" name="save" value="Сохранить" class="buttonMail">
      <input type="submit" name="delete" value="Удалить" class="buttonMail">
    </form>
    <a href="addproduct.php" class="linkBack">Назад</a>
</body>
