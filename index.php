<?php

session_start();

require_once("./php/connect.php");
require_once("./php/component.php");


// create instance of database
$database = new Createdb("productdb", "productTable");

if(isset($_POST["add"])){
  if(isset($_SESSION['cart'])){
    $item_array_id = array_column($_SESSION['cart'], "product_id");

    if(in_array($_POST['product_id'], $item_array_id)){
      echo "<script>alert('Product is already added in the cart..!')</script>";
      echo "<script>window.location = 'index.php'</script>";
    }else{
      $count = count($_SESSION['cart']);
      $item_array = array('product_id' => $_POST['product_id']);

      //Add item to session variable
      $_SESSION['cart'][$count] = $item_array;
    }

  }else{
    $item_array = array('product_id' => $_POST['product_id']);

    //create new session variable
    $_SESSION['cart'][0] = $item_array;
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Advanced Shopping Cart</title>
  <link rel="stylesheet" href="./style.css">

  <!--bootstrap CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--fontawesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <?php
    require_once("./php/header.php");
  ?>
  <div class="container">
    <div class="row text-center py-5">
      <?php 
        $result = $database->getData();

        while($row = mysqli_fetch_assoc($result)){
          component($row['product_name'], $row['product_price'], $row['product_img'], $row['id']);
        }
      ?>
    </div>
  </div>


  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>