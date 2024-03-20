<?php
  function component($productName, $price, $img, $product_id){

    $element = "
                <div class=\"col-md-3 col-sm-6 my-3 my-md-0\">
                  <form action=\"index.php\" method=\"POST\">
                    <div class=\"card shadow\">
                      <div>
                        <img src=\"./uploads/$img\" class=\"img-fluid card-img-top px-4 py-2\">
                      </div>
                      <div class=\"card-body\">
                        <h5 class=\"card-title\">$productName</h5>
                        <h6>
                          <i class=\"fa-solid fa-star\"></i>
                          <i class=\"fa-solid fa-star\"></i>
                          <i class=\"fa-solid fa-star\"></i>
                          <i class=\"fa-solid fa-star\"></i>
                          <i class=\"far fa-star\"></i>
                        </h6>
                        <p class=\"card-text\">some demo text for product description</p>
                        <span class=\"price\">$$price</span><br>
                        <button type=\"submit\" class=\"btn btn-warning my-2 px-3\" name=\"add\">Add to cart <i class=\"fa-solid fa-cart-shopping\"></i> </button>
                        <input type='hidden' name='product_id' value='$product_id'>
                      </div>
                    </div>
                  </form>
                </div>";

    echo $element;
  }

  function cartElement($img, $productname, $productprice, $product_id){
    $element = "<form action=\"cart.php?action=remove&id=$product_id\" method=\"POST\" class=\"cart-items py-2\">
                  <div class=\"border-rounded\">
                    <div class=\"row bg-white d-flex align-items-center\">
                      <div class=\"col md-3\">
                        <img src=\"./uploads/$img\" class=\"img-fluid\" alt=\"\">
                      </div>
                      <div class=\"col-md-6\">
                        <h5 class=\"pt-2\">$productname</h5>
                        <small class=\"text-secondary\"> Seller: Nahid</small>
                        <h5 class=\"pt-2\">$$productprice</h5>
                        <button type=\"submit\" class=\"btn btn-warning\">Wishlist</button>
                        <button class=\"btn btn-danger\" name=\"remove\">Remove</button>
                      </div>
                      <div class=\"col-md-3 d-flex align-items-center pt-3\">
                        <button type=\"button\" class=\"btn bg-light border rounded-circle mr-1\"><i class=\"fas fa-minus\"></i></button>
                        <input type=\"text\" value=\"1\" class=\"form-control w-25 d-inline text-center\">
                        <button type=\"button\" class=\"btn bg-light border rounded-circle ml-1\"><i class=\"fas fa-plus\"></i></button>
                      </div>
                    </div>
                  </div>
                </form>";

  echo $element;
  }
?>