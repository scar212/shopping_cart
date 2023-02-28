<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/assets/css/style.css" type="text/css">
    <title>Siroko</title>
</head>
<body>
    <div id="header_products">
        <img src="../view/assets/images/img_siroko_gym.png" id="banner">
        <h1>SIROKO</h1>
        <label id="tittle">La tienda donde puedes conseguir todos los accesorios para hacer deporte.</label>
        <a href="./process.php" id="shopping_cart" title="Ir al carrito">
            <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
            </svg>
        </a>
        <?php
            $sql= "SELECT COUNT(*)id_products FROM shopping_cart WHERE id_user = $id_user";
            $results = mysqli_query($conn,$sql);
            $fila = mysqli_fetch_assoc($results);
            $cont = $fila['id_products'];
        ?>
        <span id="count"><?php echo $cont;?></span>
        <label id="name_user">Usuario:  <?php echo $name;?></label>
    </div>
    <div class="content-products">
        <div class="products">
        <?php include_once '../controller/index.php'; 
                    while ($extraido = mysqli_fetch_array($resultD)){
                ?>  
            <form action="../controller/functions.php" method= "POST" class="form_products">
                    <div class="content_details">
                        <input type="hidden" id="id_product" name="id_product" value="<?php echo $extraido['id_products']?>">
                        <img  src="<?php echo $extraido['image']?>" class="img_productos">
                        <br>
                        <label class="name_product"><?php echo $extraido['name']?></label>
                        <br>
                        <label class="price_product">USD $<?php echo $extraido['price']?></label>
                        <br>
                        <input type="hidden" name="id_user" value="<?php echo $id_user;?>">
                        <?php 
                            include_once '../model/functions.php';
                            $functions = new FunctionsO();
                            $id_products = $extraido['id_products']; 
                            $query= "SELECT COUNT(*)id_products FROM shopping_cart WHERE id_products = $id_products";
                            $result = mysqli_query($conn,$query);
                            $data = mysqli_fetch_assoc($result);
                            $contP = $data['id_products'];
                                if($contP == 0){
                        ?>
                        <button type="submit" class="btn_car_shop" title="Agregar al carrito" name="add_to_Cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
                            </svg>
                        </button>
                        <?php
                            }else {
                        ?>
                        <button type="submit" class="btn_car_shop_delete" title="Eliminar del carrito" name="delete_to_cart">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-cart-dash-fill" viewBox="0 0 16 16">
                                <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM6.5 7h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1 0-1z"/>
                            </svg>
                        </button>
                        <?php
                            }
                        ?>
                    </div>
            </form>
                <?php
                    }
                ?>
        </div>
    </div>
</body>
</html>