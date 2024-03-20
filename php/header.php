
<header id="header">
    <nav class="navbar navbar-dark bg-dark">
        <a href="index.php" class="navbar-brand">
            <h5 class="px-5">
                <i class="fa-solid fa-basket-shopping"></i> Shopping Cart
            </h5>
        </a>
        <div>
            <div class="navbar-nav">
                <a href="cart.php" class="nav-item nav-link active">
                    <h5 class="px-5 cart">
                        <i class="fas fa-shopping-cart"></i> cart
                        
                            <?php
                                if(isset($_SESSION['cart'])){
                                    $count = count($_SESSION['cart']);
                                    echo "<span id='cart_count' class='bg-secondary px-2 pb-1 rounded-pill'>$count</span>";
                                }
                                else{
                                    echo "<span id='cart_count' class='bg-secondary px-2 pb-1 rounded-pill'>0</span>";
                                }
                            ?>
                        
                    </h5>
                </a>
            </div>
        </div>
    </nav>
</header>