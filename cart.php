
<?php
  session_start();
  require_once('./php/component.php');
  require_once('./php/connect.php');

  $db = new Createdb("productdb", "productTable");

  if(isset($_POST['remove'])){
    if ($_GET['action'] == 'remove') {
      foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['product_id'] == $_GET['id']) {
          unset($_SESSION['cart'][$key]);
          echo "<script>alert('product has been removed!')</script>";
          echo "<script>window.location = 'cart.php'</script>";
        }
      }
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cart</title>
  <link rel="stylesheet" href="./style.css">

  <!--bootstrap CDN-->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

  <!--fontawesome CDN-->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body class="bg-light">
  <?php
      require_once("./php/header.php");
  ?>

  <div class="container-fluid">
    <div class="row px-5">
      <div class="col-md-7">
        <div class="shopping-cart pt-5">
          <h6>My Cart</h6>
          <hr>

          <?php
          $total = 0;

          if(isset($_SESSION['cart'])){
            $product_id = array_column($_SESSION['cart'], 'product_id');
            $result = $db->getData();

            while($row = mysqli_fetch_assoc($result)){
              foreach($product_id as $id){
                if($row['id'] == $id){
                  cartElement($row['product_img'], $row['product_name'], $row['product_price'], $row['id']);
                  $total = $total + (int)$row['product_price'];
                }
              }
            }
          }else{
            echo "<h5>Cart is empty</h5>";
          }
          ?>
          
        </div>
      </div>
      <div class="col-md-4 offset-md-1 border rounded mt-5 bg-white h-25">
        <div class="pt-4">
          <h6>PRICE DETAILS</h6>
          <hr>
          <div class="row price-details">
            <div class="col-md-6">
              <?php
                if(isset($_SESSION['cart'])){
                  $count = count($_SESSION['cart']);
                  echo "<h6>Price($count items)</h6>";
                }else{
                  echo "<h6>Price(0 items)</h6>";
                }
              ?>
              <h6>Delivery Charges</h6>
              <hr>
              <h6>Amount Payable</h6>
            </div>
            <div class="col-md-6">
              <h6><?php echo"$$total"; ?></h6>
              <h6 class="text-success">Free</h6>
              <hr>
              <h6>$<?php echo "$total";?></h6>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>  
</body>
</html>